@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="my-2 flex justify-between sm:flex-row flex-col">
            <h2 class="text-2xl font-semibold leading-tight">Candidates Management</h2>

            <div class="block relative">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                    </svg>
                </span>
                <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>


            <button id="openModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add New Candidate
            </button>
        </div>

        <!-- Candidates Table -->
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Candidate Name
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Position Applied
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Interview Date
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $candidate->first_name }} {{ $candidate->last_name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $candidate->position ?? 'N/A' }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                                    @if ($candidate->status === 'accepted')
                                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative text-green-900">Accepted</span>
                                    @elseif ($candidate->status === 'rejected')
                                    <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                    <span class="relative text-red-900">Rejected</span>
                                    @else
                                    <span aria-hidden class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                    <span class="relative text-yellow-900">Pending</span>
                                    @endif
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $candidate->interview_date ?? 'N/A' }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('candidateinfo', $candidate->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="inline">
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
    </div>
</div>

<!-- Modal for Adding Candidate -->
<div id="candidateModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Add New Candidate</h3>
        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="block text-sm text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-sm text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="cv" class="block text-sm text-gray-700">Upload CV</label>
                <input type="file" name="cv" id="cv" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="position" class="block text-sm text-gray-700">Position</label>
                <select name="position" id="position" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Position</option>
                    @foreach ($jobs as $job)
                        <option value="{{ $job->title }}">{{ $job->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const candidateModal = document.getElementById('candidateModal');

    openModalBtn.addEventListener('click', () => {
        candidateModal.classList.remove('hidden');
        candidateModal.classList.add('flex');

    });

    closeModalBtn.addEventListener('click', () => {
        candidateModal.classList.add('hidden');
        // candidateModal.classList.remove('');
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', (event) => {
        if (event.target === candidateModal) {
            candidateModal.classList.add('hidden');
        }
    });
</script>
@endsection