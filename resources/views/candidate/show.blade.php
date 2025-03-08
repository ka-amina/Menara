@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8 py-8">
    <h2 class="text-2xl font-semibold">Candidate Details</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md mt-4">
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Position Applied:</strong> Software Engineer</p>
        <p><strong>Score:</strong> 85/100</p>
        <p><strong>Status:</strong> Accepted</p>
        <p><strong>Interview Date:</strong> 2023-10-15</p>

        <div class="mt-4">
            <p><strong>Resume:</strong></p>
            <a href="https://example.com/fake-resume.pdf" target="_blank">
                <img src="https://via.placeholder.com/600x800.png?text=Resume+Preview" 
                     alt="Candidate Resume" 
                     class="w-64 h-auto border rounded-lg shadow-md">
            </a>
        </div>

        <div class="mt-4">
            <a href="https://example.com/fake-resume.pdf" download 
               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
              
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v7.586l2.707-2.707a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 11.586V4a1 1 0 011-1z" clip-rule="evenodd" />
                    <path d="M4 16a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2z" />
                </svg>
                Download Resume
            </a>
        </div>
    </div>

    <a href="{{ route('candidates')}}" class="mt-4 inline-block text-blue-500">Back</a>
</div>
@endsection
