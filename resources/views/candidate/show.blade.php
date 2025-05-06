@extends('layouts.dashboard')

@section('title', 'Menara - Candidate')


@section('content')
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
<div class="container mx-auto px-4 sm:px-8 py-8 flex justify-center">

  <div class="w-full">
    <h2 class="text-2xl font-semibold text-center mb-6">Candidate Details</h2>

    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="space-y-3">
        <div class=" flex justify-end mt-6 ">
          <button id="edit-btn"
            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
            edit
          </button>
        </div>
        <p><strong>Name:</strong> {{ $candidate->first_name }} {{ $candidate->last_name }}</p>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>
        <p><strong>Position Applied:</strong> {{ $candidate->offer->job->title ?? 'N/A' }}</p>
        <!-- <p><strong>Score:</strong> {{ $candidate->score ?? 'N/A' }}/100</p> -->
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
  <!-- candidate modal -->
  <div id="candidateModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full h-[600px] overflow-y-auto">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Edit Candidate</h3>
      <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
          <label for="first_name" class="block text-sm text-gray-700">First Name</label>
          <input type="text" name="first_name" id="first_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500  {{ $errors->has('first_name') ? 'border-red-500' : '' }}" value="{{ $candidate->first_name }}">
          @error('first_name')
          <div class="text-red-500 mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="last_name" class="block text-sm text-gray-700">Last Name</label>
          <input type="text" name="last_name" id="last_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('last_name') ? 'border-red-500' : '' }}" value="{{ $candidate->last_name }} ">
          @error('last_name')
          <div class="text-red-500 mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="email" class="block text-sm text-gray-700">Email</label>
          <input type="email" name="email" id="email" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('email') ? 'border-red-500' : '' }}" value='{{ $candidate->email }}'>
          @error('email')
          <div class="text-red-500 mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="phone_number" class="block text-sm text-gray-700">Phone Number</label>
          <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('phone_number') ? 'border-red-500' : '' }}" value='{{ $candidate->phone_number }}'>
          @error('phone_number')
          <div class="text-red-500 mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="cv" class="block text-sm text-gray-700">Upload CV</label>
          <input type="file" name="cv" id="cv" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          @error('cv')
          <div class="text-red-500 mt-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="position" class="block text-sm text-gray-700">Position</label>
          <select name="offer_id" id="position" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('offer_id') ? 'border-red-500' : '' }}">
            <option value="">Select Position</option>
            @foreach ($jobs as $offer)
            <option value="{{ $offer->id }}" {{ $offer->id == $candidate->offer_id ? 'selected' : '' }}>{{ $offer->job->title }} - {{$offer->company->user->name}}</option>
            @endforeach
          </select>
          @error('offer_id')
          <div class="text-red-500 mt-2">{{ $message }}</div>
          @enderror
        </div>
        <!-- <div class="mb-4">
          <label for="status" class="block text-sm text-gray-700">Status</label>
          <select name="status" id="status" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="pending" {{ $candidate->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="accepted" {{ $candidate->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="rejected" {{ $candidate->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
          </select>
        </div> -->

        <!-- <div class="mb-4">
          <label for="interview_date" class="block text-sm text-gray-700">Interview Date</label>
          <input type="date" name="interview_date" id="interview_date" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $candidate->interview_date }}">
        </div> -->
        <div class="flex justify-end space-x-2">
          <button type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  const editBtn = document.getElementById('edit-btn');
  const candidateModal = document.getElementById('candidateModal');
  const closeModalBtn = document.getElementById('closeModalBtn');


  editBtn.addEventListener('click', () => {
    candidateModal.classList.remove('hidden');
    candidateModal.classList.add('flex');

  });

  closeModalBtn.addEventListener('click', () => {
    candidateModal.classList.add('hidden');
    // candidateModal.classList.remove('');
  });

  const hasErrors = JSON.parse("@json($errors->any())");
  if (hasErrors) {
    candidateModal.classList.remove('hidden');
    candidateModal.classList.add('flex');
  }

  // Close modal when clicking outside of it
  window.addEventListener('click', (event) => {
    if (event.target === candidateModal) {
      candidateModal.classList.add('hidden');
    }
  });
</script>
@endsection