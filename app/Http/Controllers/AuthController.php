<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\StoreInterviewerRequest;
use App\Interfaces\UserInterface;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $candidatesCount = Candidate::count();
        $interviewsCount = Interview::count();
        $interviewersCount = User::where('role', 'interviewer')->count();
        $companiesCount = User::where('role', 'interviewer')->count();
        $recentInterviews = Interview::with(['candidate', 'interviewer'])->orderByDesc('scheduled_at')->limit(5)->get();

        $today = now()->startOfDay();
        $weekStart = now()->startOfWeek();
        $weekEnd = now()->endOfWeek();
        $todaysInterviewsCount = Interview::whereDate('scheduled_at', $today)->where('interviewer_id', Auth::user()->id)->count();

        $pendingInterviews = Interview::whereDate('scheduled_at', $today)
            ->where('interviewer_id', Auth::id())
            ->whereHas('candidate', function ($query) {
                $query->where('status', 'pending');
            })
            ->count();
        // dd($pendingInterviews);

        $candidatesThisWeek = Candidate::whereBetween('created_at', [$weekStart, $weekEnd])->count();

        if (Gate::allows('isAdmin')) {
            return view('Admin.index', compact('candidatesCount', 'interviewersCount', 'companiesCount', 'interviewsCount', 'recentInterviews'));
        }

        if (Gate::allows('isInterviewer')) {
            return view('interviewer.index', compact('candidatesCount', 'interviewsCount', 'todaysInterviewsCount', 'pendingInterviews', 'candidatesThisWeek'));
        }
    }


    public function register(StoreInterviewerRequest  $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|unique:users',
        //     'phone' => 'required|string'
        // ]);

        $this->userRepository->create($request->all());

        return redirect()->back()->with('success', 'Interviewer created successfully.');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'general_error' => 'Invalid credentials'
            ])->withInput($request->only('email'));
        }
        Auth::login($user);
        $data['token'] = $user->createToken($request->name . 'Auth-Token')->plainTextToken;
        $data['user'] = $user;
        $response = [
            'status' => 'success',
            'message' => 'user is logged in successfuly.',
            'data' => $data,
        ];
        // dd(Auth::user()->role);
        // if ($request->expectsJson()) {
        // return response()->json($response, 200);
        // }
        // return response()->json($response, 200);
        if (Gate::allows('isCompany')) {
            return redirect()->route('offers.show');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'User is logged out',
        // ], 200);
        return redirect()->route('login');
    }

    public function forgot(ForgotPasswordRequest $request)
    {
        // dd($request);
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json([
                'status' => 'failed',
                'message' => 'no record found',
            ], 404);
        }

        // generate a 4 digit random token
        $resetPasswordToken = str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);

        if (!$userPassReset = PasswordReset::where('email', $user->email)->first()) {
            PasswordReset::create([
                'email' => $user->email,
                'token' => $resetPasswordToken,
            ]);
        } else {
            $userPassReset->update([
                'email' => $user->email,
                'token' => $resetPasswordToken
            ]);
        }


        $user->notify(
            new PasswordResetNotification(
                $user,
                $resetPasswordToken,
            )
        );


        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'the code is sent to your email',
        //     // 'token'=>$resetPasswordToken,
        // ], 200);
        return redirect()->route('reset');
    }

    public function reset(ResetPasswordRequest $request)
    {
        $attributes = $request->validated();
        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            return response()->json([
                'status' => 'faild',
                'message' => 'no record found',
            ], 404);
        }

        $resetRequest = PasswordReset::where('email', $user->email)->first();

        if (!$resetRequest || $resetRequest->token != $request->token) {
            return response()->json([
                'status' => 'faild',
                'message' => 'token mismatch',
            ], 400);
        }
        $user->fill([
            'password' => bcrypt($attributes['password'])
        ]);

        $user->save();

        $user->tokens()->delete();

        $resetRequest->delete();

        $token = $user->createToken('Auth-Token')->plainTextToken;


        // return response()->json([
        //     'message' => 'password Reset success',
        //     'accessToken' => $token,
        // ], 201);
        return redirect()->route('interviewerdashboard');
    }
}
