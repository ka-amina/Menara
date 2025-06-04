@extends('layouts.app')

@section('title', 'Menara - Reset Password')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-md w-96">
        <form action="{{route('reset')}}" method="POST">
            @csrf
            <div class="text-center mb-8">
                <img id="profile-image-preview" src="{{ asset('logo_transparent.png') }}" alt="Profile" class="w-24 h-24 object-cover mx-auto">
            </div>

            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-primary mb-4">Reset Password</h2>
                <p class="text-gray-600">
                    Create a new password for your account
                </p>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input
                    id="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-primary"
                    type="email"
                    name="email"
                    placeholder="name@gmail.com"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="token" class="block text-gray-700 text-sm font-bold mb-2">Reset Code</label>
                <input
                    id="token"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-primary"
                    type="text"
                    name="token"
                    placeholder="Enter reset code">
                @error('token')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                <input
                    id="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-primary"
                    type="password"
                    name="password"
                    placeholder="••••••••">
                @error('password')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                <input
                    id="password_confirmation"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-primary"
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••">
            </div>

            <div class="text-center">
                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-primary-hover text-white font-bold py-2 px-4 rounded-md">
                    Reset Password
                </button>
            </div>

            <div class="text-center mt-6">
                <a href="{{route('login')}}" class="text-primary hover:underline">
                    Back to Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection