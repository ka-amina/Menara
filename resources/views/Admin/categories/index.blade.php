@extends('layouts.dashboard')
@section('title', 'Menara - Categories')


@section('content')
<div class="min-h-screen flex flex-col w-full">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <!-- Page Title and Add Button -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold leading-tight">Categories</h2>
                <button id="openModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add New Category
                </button>
            </div>

            <!-- Categories Table -->
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Category Name
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                                    </form>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


            <div id="categoryModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">

                <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Add Category</h3>
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm text-gray-700">Category Name</label>
                            <input type="text" name="name" id="category_name" value="{{ old('name') }}" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                            @if ($errors->has('name'))
                                <div class="text-red-500 mt-2">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($categories->hasPages())
            <div class="mt-10 flex justify-center">
                <div class="flex items-center space-x-2">
                    {{-- Previous Page --}}
                    @if ($categories->onFirstPage())
                    <span class="px-3 py-2 rounded-md border border-gray-300 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $categories->previousPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                    @if ($page == $categories->currentPage())
                    <span class="px-4 py-2 rounded-md border border-primary bg-primary text-white">{{ $page }}</span>
                    @elseif ($page <= $categories->currentPage() + 2 && $page >= $categories->currentPage() - 2)
                        <a href="{{ $url }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">{{ $page }}</a>
                        @elseif ($page == $categories->currentPage() + 3 || $page == $categories->currentPage() - 3)
                        <span class="px-4 py-2 text-gray-500">...</span>
                        @endif
                        @endforeach

                        {{-- Next Page --}}
                        @if ($categories->hasMorePages())
                        <a href="{{ $categories->nextPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        @else
                        <span class="px-3 py-2 rounded-md border border-gray-300 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
      document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('categoryModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });
    
    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });
    
    const hasErrors = JSON.parse("@json($errors->any())");
    if (hasErrors) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
});
</script>
@endsection