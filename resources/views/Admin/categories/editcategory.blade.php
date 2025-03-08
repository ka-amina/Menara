@extends('layouts.dashboard')
<div class="min-h-screen flex flex-col w-full">
    @section('content')
    <div id="categoryModal" class="fixed flex inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 ">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Edit Category: name</h3>
                <form action="#">
                    <div class="mb-4">
                        <label for="category_name" class="block text-sm text-gray-700">Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400"><a href="{{route('categories')}}">Cancel</a></button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
@section('scripts')
<script src="{{ mix('resources/js/app.js') }}"></script>
@endsection