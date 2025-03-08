@extends('layouts.app')

@section('content')

<div
    class="max-w-md w-full mx-auto rounded-xl shadow-[0_2px_10px_-2px_rgba(195,169,50,0.5)] p-8 relative mt-12">
    <form action="#" method="POST">
        <div class="flex justify-center my-5">logo</div>

        <div class="flex flex-col p-2">
            <label for="username"> gmail </label>
            <input
                class="p-2 border-b border-primary"
                type="text"
                placeholder="name" />
        </div>

        <div class="flex flex-col p-2">
            <label for="password" class="">password</label>
            <input
                class="p-2 border-b border-primary"
                type="password"
                placeholder="••••••••" />
        </div>

        <div class="flex justify-between">
            <label class="flex items-center">
                <input type="checkbox" class="rounded border-primary ">
                <span>remember me</span>
            </label>
            <a href="{{route('forgetpassword')}}" class="text-primary hover:underline">forgot Password?</a>
            <span></span>
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

@endsection