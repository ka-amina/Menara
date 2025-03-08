@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen flex flex-col w-full">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <!-- Page Title and Add Button -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold leading-tight">Jobs Management</h2>
                <button id="openModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add New Job
                </button>
            </div>

            <!-- Jobs Table -->
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Job Title
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Job 1 -->
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Software Engineer</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{route('editjob')}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>

                            <!-- Job 2 -->
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Marketing Manager</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{route('editjob')}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>

                            <!-- Job 3 -->
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Graphic Designer</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{route('editjob')}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add Job Modal -->
            <div id="jobModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Add New Job</h3>
                    <form action="#">
                        <div class="mb-4">
                            <label for="job_title" class="block text-sm text-gray-700">Job Title</label>
                            <input type="text" name="job_title" id="job_title" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="department" class="block text-sm text-gray-700">Department</label>
                            <input type="text" name="department" id="department" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const jobModal = document.getElementById("jobModal");

    openModalBtn.addEventListener("click", () => {
        jobModal.classList.remove("hidden");
        jobModal.classList.add("flex");
    });

    closeModalBtn.addEventListener("click", () => {
        jobModal.classList.add("hidden");
    });

    jobModal.addEventListener("click", (e) => {
        if (e.target === jobModal) {
            jobModal.classList.add("hidden");
        }
    });
</script>

<script src="{{ mix('resources/js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection