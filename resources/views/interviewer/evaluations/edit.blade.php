@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Candidate Evaluations</h2>
        </div>

        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800">Candidate Details</h3>
            <div class="mt-4">
                <p class="text-gray-700"><span class="font-medium">Name:</span> John Doe</p>
                <p class="text-gray-700"><span class="font-medium">Position Applied:</span> Software Engineer</p>
                <p class="text-gray-700"><span class="font-medium">Interview Date:</span> 2023-10-15</p>
            </div>
        </div>

        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800">Evaluation Questions</h3>
            <div class="mt-4 overflow-x-auto">
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
        <!-- Row 1 -->
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
                <p>response from database</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="text-indigo-600 hover:text-indigo-900"><a href="#">Edit</a></button>
                <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </td>
        </tr>
        <!-- Row 2 -->
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
                <p>response from database</p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="text-indigo-600 hover:text-indigo-900"><a href="#">Edit</a></button>
                <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

            </div>
            <div class="mt-6 flex justify-end">

                <button id="add-question-btn" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add Question
                </button>
            </div>
            <div class="mt-6 flex justify-end">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit Evaluation
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Question -->
    <div id="add-question-modal" class="fixed inset-0  items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg w-96">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Select a Question</h3>
            <div>
                <select class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="restful_api">Explain the concept of RESTful APIs</option>
                    <option value="conflict_handling">What is your approach to handling conflicts in a team?</option>
                </select>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <button id="close-modal-btn" type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    const addQuestionBtn = document.getElementById('add-question-btn');
    const addQuestionModal = document.getElementById('add-question-modal');
    const closeModalBtn = document.getElementById('close-modal-btn');


    addQuestionBtn.addEventListener('click', function() {
        addQuestionModal.classList.remove('hidden');
        addQuestionModal.classList.add('flex');

    });

    closeModalBtn.addEventListener('click', function() {
        addQuestionModal.classList.add('hidden');
    });
</script>
@endsection