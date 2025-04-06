@extends('layouts.dashboard')

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
        <select name="candidate_id" id="candidate_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
          <option value="">Select Candidate</option>
          @foreach ($candidates as $candidate)
          <option value="{{ $candidate->id }}">{{ $candidate->first_name }} {{ $candidate->last_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label for="interviewer_id" class="block text-sm text-gray-700">Interviewer</label>
        <select name="interviewer_id" id="interviewer_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
          <option value="">Select Interviewer</option>
          @foreach ($interviewers as $interviewer)
          <option value="{{ $interviewer->id }}">{{ $interviewer->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label for="scheduled_at" class="block text-sm text-gray-700">Date</label>
        <input type="date" name="scheduled_at" id="scheduled_at"
          class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required>
      </div>

      <div class="mb-4">
        <label for="start_time" class="block text-sm text-gray-700">Start Time</label>
        <input type="time" name="start_time" id="start_time"
          class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required>
      </div>

      <div class="mb-4">
        <label for="end_time" class="block text-sm text-gray-700">End Time</label>
        <input type="time" name="end_time" id="end_time"
          class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required>
      </div>

      <div class="mb-4">
        <label for="offer_id" class="block text-sm text-gray-700">Offer</label>
        <select name="offer_id" id="offer_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
          <option value="">Select Offer</option>
          @foreach ($offers as $offer)
          <option value="{{ $offer->id }}">{{ $offer->job->title }} - {{ $offer->company->user->name }}</option>
          @endforeach
        </select>
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
</script>
@endsection