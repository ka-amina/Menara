@extends('layouts.app')

@section('title', 'Menara - Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-md w-96">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="text-center mb-8">
                <img id="profile-image-preview" src="{{ asset('logo_transparent.png') }}" alt="Profile" class="w-24 h-24 object-cover mx-auto">
            </div>

            @if (session('errors') && !empty(session('errors')->first('general_error')))
                <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
                    {{ session('errors')->first('general_error') }}
                </div>
            @endif

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter your email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-primary" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-primary">
                @error('password')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between items-center mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox h-5 w-5 text-primary">
                    <span class="ml-2 text-sm text-gray-700">Remember me</span>
                </label>
                <a href="{{ route('forgetpassword') }}" class="text-primary hover:underline">Forgot Password?</a>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-primary hover:bg-primary-hover text-white font-bold py-2 px-4 rounded-md">
                    Log In
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-blue-600 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back
            </a>
        </div>
    </div>
</div>
@endsection