@extends('layouts.app')

@section('title', 'Menara - Login')

@section('content')

<div class="max-w-md w-full mx-auto rounded-xl shadow-[0_2px_10px_-2px_rgba(195,169,50,0.5)] p-8 relative mt-12">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="flex justify-center my-5">
        <img id="profile-image-preview" src="{{ asset('logo_transparent.png') }}" alt="Profile" class=" h-24 object-cover ">
        </div>

        @if (session('errors') && !empty(session('errors')->first('general_error')))
        <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            {{ session('errors')->first('general_error') }}
        </div>
        @endif

        <div class="flex flex-col p-2">
            <label for="email"> gmail </label>
            <input class="p-2 border-b border-primary" type="text"
                placeholder="name" name="email"
                value="{{ old('email') }}">
            @error('email')
            <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col p-2">
            <label for="password" class="">password</label>
            <input
                name="password"
                class="p-2 border-b border-primary"
                type="password"
                placeholder="••••••••">
            @error('password')
            <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('forgetpassword') }}" class="text-primary hover:underline">forgot Password?</a>
        </div>

        <div class="flex justify-center">
            <button
                type="submit"
                class="my-4 rounded-md w-full bg-primary text-white hover:bg-primary-hover p-2">
                log in
            </button>
        </div>
    </form>

</div>
<a href="{{ route('home') }}" class="flex justify-center underline text-blue-600 mt-6">Go Back</a>

@endsection