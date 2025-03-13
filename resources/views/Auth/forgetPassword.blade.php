@extends('layouts.app')

@section('content')

<div
    class="max-w-md w-full mx-auto rounded-xl shadow-[0_2px_10px_-2px_rgba(195,169,50,0.5)] p-8 relative mt-12">
    <form action="{{ route('forgot') }}" method="POST">
    @csrf
    <div class="flex justify-center my-5">logo</div>
        <div class="flex justify-center my-5">
            <h2 class="text-2xl font-bold text-primary">Forgot Password</h2>
        </div>

        <div class="text-center mb-6">
            <p class="text-gray-600">
                Enter the email address associated with your account
            </p>
        </div>

        <div class="flex flex-col p-2">
            <label for="email" class="mb-2">Email Address</label>
            <input
            name="email"
                id="email"
                class="p-2 border-b border-primary"
                type="email"
                placeholder="name@gmail.com"
                 />
        </div>

        <div class="flex justify-center">
            <button
                type="submit"
                class="my-4 rounded-md w-full bg-primary text-white hover:bg-primary-hover p-2">
                Send Reset Link
            </button>
        </div>

        <div class="text-center mt-4">
            <a href="{{route('login')}}" class="text-primary hover:underline">
                Back to Login
            </a>
        </div>
    </form>
</div>

@endsection