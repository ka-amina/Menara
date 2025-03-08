<!-- File: evaluation.blade.php -->
@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Candidate Evaluation</h2>
        </div>
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <!-- Candidate Information -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Candidate Details</h3>
                <div class="mt-4">
                    <p class="text-gray-700"><span class="font-medium">Name:</span> John Doe</p>
                    <p class="text-gray-700"><span class="font-medium">Position Applied:</span> Software Engineer</p>
                    <p class="text-gray-700"><span class="font-medium">Interview Date:</span> 2023-10-15</p>
                </div>
            </div>

            <form>
              
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Technical Skills</h3>
                    <div class="mt-4">
                        <label class="block text-gray-700">Programming Skills</label>
                        <input type="range" min="0" max="10" value="5" class="w-full">
                        <div class="flex justify-between text-xs text-gray-600">
                            <span>0 (Poor)</span>
                            <span>10 (Excellent)</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700">Problem-Solving</label>
                        <input type="range" min="0" max="10" value="5" class="w-full">
                        <div class="flex justify-between text-xs text-gray-600">
                            <span>0 (Poor)</span>
                            <span>10 (Excellent)</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Communication Skills</h3>
                    <div class="mt-4">
                        <label class="block text-gray-700">Clarity of Expression</label>
                        <input type="range" min="0" max="10" value="5" class="w-full">
                        <div class="flex justify-between text-xs text-gray-600">
                            <span>0 (Poor)</span>
                            <span>10 (Excellent)</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700">Team Collaboration</label>
                        <input type="range" min="0" max="10" value="5" class="w-full">
                        <div class="flex justify-between text-xs text-gray-600">
                            <span>0 (Poor)</span>
                            <span>10 (Excellent)</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Overall Evaluation</h3>
                    <div class="mt-4">
                        <label class="block text-gray-700">Overall Score</label>
                        <input type="range" min="0" max="10" value="5" class="w-full">
                        <div class="flex justify-between text-xs text-gray-600">
                            <span>0 (Poor)</span>
                            <span>10 (Excellent)</span>
                        </div>
                    </div>
                </div>


                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Submit Evaluation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

