@extends('layouts.app')

@section('content')

<div class="max-w-2xl w-full mx-auto rounded-xl shadow-[0_2px_10px_-2px_rgba(195,169,50,0.5)] p-8 relative mt-12">
    <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-center my-5">
            <img src="#" alt="Logo" class="w-20 h-20">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
            <div>
                <div class="flex flex-col p-2">
                    <label for="company-name">Company Name <span class="text-red-500">*</span></label>
                    <input class="p-3 border-b border-primary w-full" type="text" placeholder="Company Name" name="name">
                </div>

                <div class="flex flex-col p-2">
                    <label for="industry">Industry <span class="text-red-500">*</span></label>
                    <select class="p-3 border-b border-primary w-full appearance-none" name="industry">
                        <option value="">Select an Industry</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col p-2">
                    <label for="company-logo">Company Logo</label>
                    <input class="p-3 border-b border-primary w-full" type="file" name="logo" accept="image/*">
                </div>

                <div class="flex flex-col p-2">
                    <label for="address">Address <span class="text-red-500">*</span></label>
                    <input class="p-3 border-b border-primary w-full" type="text" placeholder="Company Address" name="address">
                </div>
            </div>

            <div>
                <div class="flex flex-col p-2">
                    <label for="email">Email <span class="text-red-500">*</span></label>
                    <input class="p-3 border-b border-primary w-full" type="email" placeholder="name@company.com" name="email">
                </div>

                <div class="flex flex-col p-2">
                    <label for="phone">Phone <span class="text-red-500">*</span></label>
                    <input class="p-3 border-b border-primary w-full" type="tel" placeholder="+123 456 789" name="phone">
                </div>

                <div class="flex flex-col p-2">
                    <label for="description">Description</label>
                    <textarea class="p-3 border-b border-primary w-full" placeholder="Describe your company" name="description" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="flex flex-col p-2 mt-6">
            <label for="password">Password <span class="text-red-500">*</span></label>
            <input class="p-3 border-b border-primary w-full" type="password" placeholder="Create a Password" name="password">
        </div>

        <div class="flex justify-center">
            <button type="submit" class="my-4 rounded-md w-full bg-primary text-white hover:bg-primary-hover p-3 text-lg">
                Create My Company Account
            </button>
        </div>
    </form>
</div>

@endsection
