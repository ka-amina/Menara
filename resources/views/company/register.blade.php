@extends('layouts.app')

@section('title', 'Menara - Register')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="max-w-2xl w-full mx-auto bg-white rounded-xl shadow-md p-8 mt-12">
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="flex justify-center my-5">
                <img id="profile-image-preview" src="{{ asset('logo_transparent.png') }}" alt="Menara Logo" class="w-24 h-24 object-cover">
            </div>

            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Create Company Account</h2>

            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{ session('success') }}
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <div class="mb-4">
                        <label for="company-name" class="block text-gray-700 font-medium mb-2">Company Name <span class="text-red-500">*</span></label>
                        <input class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" type="text" placeholder="Company Name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="industry" class="block text-gray-700 font-medium mb-2">Industry <span class="text-red-500">*</span></label>
                        <select class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="industry">
                            <option value="">Select an Industry</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('industry') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('industry')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="company-logo" class="block text-gray-700 font-medium mb-2">Company Logo</label>
                        <input class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" type="file" name="logo" accept="image/*">
                        @error('logo')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-medium mb-2">Address <span class="text-red-500">*</span></label>
                        <input class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" type="text" placeholder="Company Address" name="address" value="{{ old('address') }}">
                        @error('address')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
                        <input class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" type="email" placeholder="name@company.com" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone <span class="text-red-500">*</span></label>
                        <input class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" type="tel" placeholder="+123 456 789" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Describe your company" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password <span class="text-red-500">*</span></label>
                <input class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" type="password" placeholder="Create a Password" name="password">
                @error('password')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium py-3 px-6 rounded-lg w-full hover:bg-gradient-to-l hover:from-blue-700 hover:to-indigo-700 transition-all">
                    Create My Company Account
                </button>
            </div>
        </form>

        <div class="text-center mt-8">
            <a href="{{route('home')}}" class="text-blue-600 hover:text-blue-700 underline">Go Back</a>
        </div>
    </div>
</div>
@endsection