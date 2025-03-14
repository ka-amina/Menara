<!-- File: questions.blade.php -->
@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
        </div>
        <div class="my-2 flex justify-between sm:flex-row flex-col">
            <h2 class="text-2xl font-semibold leading-tight">Questions Management</h2>

            <div class="flex ">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <select class="h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option>All</option>
                        <option>Technical</option>
                        <option>Administrative</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="block relative">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                    </svg>
                </span>
                <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
            </div>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
    <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Question
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Category
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Difficulty
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Response
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">Explain the concept of RESTful APIs.</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">Technical</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <span class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                    <span aria-hidden class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                    <span class="relative">Medium</span>
                </span>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="w-full p-2" rows="2">RESTful APIs are a set of architectural principles for designing networked applications. They use standard HTTP methods like GET, POST, PUT, and DELETE to perform CRUD operations on resources.</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </td>
        </tr>
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">What is your approach to handling conflicts in a team?</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">Administrative</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                    <span class="relative">Easy</span>
                </span>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="w-full p-2 " rows="2">My approach to handling conflicts involves open communication, active listening, and finding a mutually acceptable solution.</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </td>
        </tr>
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">What is the difference between SQL and NoSQL databases?</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">Technical</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                    <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                    <span class="relative">Hard</span>
                </span>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="w-full p-2 " rows="2" placeholder="Enter response..."></p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Any additional scripts can be included here -->
@endsection