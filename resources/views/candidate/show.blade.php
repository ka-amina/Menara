@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8 py-8 flex justify-center">
  <div class="w-full">
    <h2 class="text-2xl font-semibold text-center mb-6">Candidate Details</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="space-y-3">
        <p><strong>Name:</strong> {{ $candidate->first_name }} {{ $candidate->last_name }}</p>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>
        <p><strong>Position Applied:</strong> {{ $candidate->position ?? 'N/A' }}</p>
        <p><strong>Score:</strong> {{ $candidate->score ?? 'N/A' }}/100</p>
        <p><strong>Status:</strong> 
          @if ($candidate->status === 'accepted')
            <span class="text-green-600 font-semibold">Accepted</span>
          @elseif ($candidate->status === 'rejected')
            <span class="text-red-600 font-semibold">Rejected</span>
          @else
            <span class="text-yellow-600 font-semibold">Pending</span>
          @endif
        </p>
        <p><strong>Interview Date:</strong> {{ $candidate->interview_date ?? 'N/A' }}</p>
      </div>
      
      <div class="mt-6">
        <p class="mb-2"><strong>Resume:</strong></p>
        <div class="flex justify-center">
          <embed src="{{ asset('storage/' . $candidate->cv_path) }}" width="80%" height="800px" />
        </div>
      </div>
      
      <div class="mt-6 flex justify-center">
        <a href="{{ asset('storage/' . $candidate->cv_path) }}" download="{{ basename($candidate->cv_path) }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v7.586l2.707-2.707a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 11.586V4a1 1 0 011-1z" clip-rule="evenodd" />
            <path d="M4 16a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2z" />
          </svg>
          Download Resume
        </a>
      </div>
    </div>
    
    <div class="mt-4 text-center">
      <a href="{{ route('candidates') }}" class="inline-block text-blue-500 hover:underline">Back</a>
    </div>
  </div>
</div>
@endsection