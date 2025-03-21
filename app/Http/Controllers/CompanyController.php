<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Category;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }

    public function companyRegister()
    {
        $categories = Category::all();
        return view('company.register', compact('categories'));
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users',
                'password' => 'required|string',
                'phone' => 'required|string',
                'industry' => 'required|string',
                'address' => 'required|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'description' => 'nullable|string'
            ]);

            $avatarPath = $request->file('logo')->store('company_logos', 'public');

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'avatar' => $avatarPath,
                'role' => 'company'
            ]);
            

            if ($user->save()) {
                $tokenResult = $user->createToken('personal acces token');
                $token = $tokenResult->plainTextToken;

                // return response()->json([
                //     'message' => 'Successfully created user!',
                //     'accessToken' => $token,
                // ], 201);
            }
            // dd($user->id);
            // else {
            //     return response()->json(['error' => 'Provide proper details'], 500);
            // }


            // dd($company);
            DB::table('companies')->insert([
                'user_id' => $user->id,
                'category_id'=>$request->industry,
                'description'=>$request->description,
                'address'=>$request->address

            ]);
            DB::commit();

            return redirect()->route('login');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create career record. Please try again'. $e);
            dd($e);
        }
    }
}
