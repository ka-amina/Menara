@extends('layouts.dashboard')
@section('title', 'Interviews')
@section('content')
<div class="container mx-auto px-4 sm:px-8 py-8">
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
  <div class="w-full">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold">Scheduled Interviews</h2>
      <button id="scheduleInterviewBtn"
        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
        Schedule New Interview
      </button>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
      <table class="min-w-full">
        <thead>
          <tr class="border-b">
            <th class="px-6 py-3 text-left">Candidate</th>
            <th class="px-6 py-3 text-left">Interviewer</th>
            <th class="px-6 py-3 text-left">Date & Time</th>
            <th class="px-6 py-3 text-left">Duration</th>
            <th class="px-6 py-3 text-left">Meeting Link</th>
            <th class="px-6 py-3 text-left">Status</th>
            <th class="px-6 py-3 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($interviews as $interview)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-4">{{ $interview->candidate->first_name }} {{ $interview->candidate->last_name }}</td>
            <td class="px-6 py-4">{{ $interview->interviewer->name }}</td>
            <td class="px-6 py-4">
              {{ $interview->scheduled_at->format('M d, Y') }}<br>
              {{ date('h:i A', strtotime($interview->start_time)) }} - {{ date('h:i A', strtotime($interview->end_time)) }}
            </td>
            <td class="px-6 py-4">
              @php
              $duration = (strtotime($interview->end_time) - strtotime($interview->start_time)) / 60;
              @endphp
              {{ $duration }} mins
            </td>
            <td class="px-6 py-4">
              <a href="{{ $interview->meeting_link }}" target="_blank" class="text-blue-500 hover:underline">
                Join Meeting
              </a>
            </td>
            <td class="px-6 py-4">
              @if ($interview->candidate->status === 'accepted')
              <span class="text-green-600 font-semibold">Accepted</span>
              @elseif ($interview->candidate->status === 'rejected')
              <span class="text-red-600 font-semibold">Rejected</span>
              @else
              <span class="text-yellow-600 font-semibold">Pending</span>
              @endif
            </td>
            <td class="px-6 py-4 space-x-2">
              <a href="{{route('evaluations.show',$interview->id)}}" class="text-blue-500 hover:underline">View</a>
              <form action="{{route('interviews.destroy', $interview->id)}}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No interviews scheduled yet</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if ($interviews->hasPages())
            <div class="mt-10 flex justify-center">
                <div class="flex items-center space-x-2">
                    {{-- Previous Page --}}
                    @if ($interviews->onFirstPage())
                    <span class="px-3 py-2 rounded-md border border-gray-300 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $interviews->previousPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($interviews->getUrlRange(1, $interviews->lastPage()) as $page => $url)
                    @if ($page == $interviews->currentPage())
                    <span class="px-4 py-2 rounded-md border border-primary bg-primary text-white">{{ $page }}</span>
                    @elseif ($page <= $interviews->currentPage() + 2 && $page >= $interviews->currentPage() - 2)
                        <a href="{{ $url }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">{{ $page }}</a>
                        @elseif ($page == $interviews->currentPage() + 3 || $page == $interviews->currentPage() - 3)
                        <span class="px-4 py-2 text-gray-500">...</span>
                        @endif
                        @endforeach

                        {{-- Next Page --}}
                        @if ($interviews->hasMorePages())
                        <a href="{{ $interviews->nextPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
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

<!-- Schedule Interview Modal -->
<div id="scheduleModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
  <div class="bg-white rounded-lg p-6 max-w-md w-full h-[600px] overflow-y-auto">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Schedule New Interview</h3>
    <form action="{{ route('interviews.store') }}" method="POST">
      @csrf

      <div class="mb-4">
        <label for="candidate_id" class="block text-sm text-gray-700">Candidate</label>
        <select name="candidate_id" id="candidate_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('candidate_id') ? 'border-red-500' : '' }}" >
          <option value="">Select Candidate</option>
          @foreach ($candidates as $candidate)
          <option value="{{ $candidate->id }}" {{ old('candidate_id') == $candidate->id ? 'selected' : '' }}>{{ $candidate->first_name }} {{ $candidate->last_name }}</option>
          @endforeach
        </select>
        @error('candidate_id')
        <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="interviewer_id" class="block text-sm text-gray-700">Interviewer</label>
        <select name="interviewer_id" id="interviewer_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('interviewer_id') ? 'border-red-500' : '' }}" >
          <option value="">Select Interviewer</option>
          @foreach ($interviewers as $interviewer)
          <option value="{{ $interviewer->id }}" {{ old('interviewer_id') == $interviewer->id ? 'selected' : '' }}>{{ $interviewer->name }}</option>
          @endforeach
        </select>
        @error('interviewer_id')
        <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="scheduled_at" class="block text-sm text-gray-700">Date</label>
        <input type="date" name="scheduled_at" id="scheduled_at"
          class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('scheduled_at') ? 'border-red-500' : '' }}"
           value="{{ old('scheduled_at') }}">
        @error('scheduled_at')
        <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="start_time" class="block text-sm text-gray-700">Start Time</label>
        <input type="time" name="start_time" id="start_time"
          class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('start_time') ? 'border-red-500' : '' }}"
           value="{{ old('start_time') }}">
        @error('start_time')
        <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="end_time" class="block text-sm text-gray-700">End Time</label>
        <input type="time" name="end_time" id="end_time"
          class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('end_time') ? 'border-red-500' : '' }}"
           value="{{ old('end_time') }}">
        @error('end_time')
        <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="offer_id" class="block text-sm text-gray-700">Offer</label>
        <select name="offer_id" id="offer_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('offer_id') ? 'border-red-500' : '' }}" >
          <option value="">Select Offer</option>
          @foreach ($offers as $offer)
          <option value="{{ $offer->id }}" {{ old('offer_id') == $offer->id ? 'selected' : '' }}>{{ $offer->job->title }} - {{ $offer->company->user->name }}</option>
          @endforeach
        </select>
        @error('offer_id')
        <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>

      <div class="flex justify-end space-x-2">
        <button type="button" id="closeScheduleModal" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Schedule</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // Schedule Interview Modal
  const scheduleBtn = document.getElementById('scheduleInterviewBtn');
  const scheduleModal = document.getElementById('scheduleModal');
  const closeScheduleBtn = document.getElementById('closeScheduleModal');

  scheduleBtn.addEventListener('click', () => {
    scheduleModal.classList.remove('hidden');
    scheduleModal.classList.add('flex');
  });

  closeScheduleBtn.addEventListener('click', () => {
    scheduleModal.classList.add('hidden');
  });

  window.addEventListener('click', (event) => {
    if (event.target === scheduleModal) {
      scheduleModal.classList.add('hidden');
    }
  });

  const hasErrors = JSON.parse("@json($errors->any())");
    if (hasErrors) {
      scheduleModal.classList.remove('hidden');
      scheduleModal.classList.add('flex');
    }
</script>
@endsection