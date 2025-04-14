@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class=" text-2xl font-semibold leading-tight">{{$interview->offer->job->title}} - {{$interview->offer->company->user->name}} </h2>
            <h2 class=" mb-4 text-2xl font-semibold leading-tight">({{$interview->offer->job->category->name}})</h2>
        </div>


        <div class="mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800">Candidate Details</h3>
                <div class="flex justify-between">

                    <div class="mt-4 space-y-2">
                        <p class="text-gray-700"><span class="font-medium">Name:</span> {{$interview->candidate->first_name}} {{$interview->candidate->last_name}} </p>
                        <p class="text-gray-700"><span class="font-medium">Position Applied:</span> {{$interview->offer->job->title}}</p>
                        <p class="text-gray-700"><span class="font-medium">Interview Date:</span> {{$interview->scheduled_at}}</p>
                        <p class="text-gray-700"><span class="font-medium">Company:</span> {{$interview->offer->company->user->name}}</p>
                        <p class="text-gray-700"><span class="font-medium">Location:</span> {{$interview->offer->company->address}}</p>
                        <p class="text-gray-700"><span class="font-medium">Location type:</span> {{$interview->offer->location_type}}</p>
                    </div>

                    <div class="">
                        <a href="{{ route('candidates.view-resume', $interview->candidate->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            View Resume
                        </a>
                    </div>
                </div>


                <h3 class="mt-4 text-xl font-semibold text-gray-800">About offer</h3>
                <div class="mt-5">
                    <h4 class="font-medium text-gray-800">{{$interview->offer->about_offer}}</h4>
                    <p class="text-gray-700"><span class="font-medium">Level:</span> {{$interview->offer->level}}</p>
                    <p class="text-gray-700"><span class="font-medium">Contract Type:</span> {{$interview->offer->contract_type}}</p>
                    <p class="text-gray-700"><span class="font-medium">Start Date:</span> {{$interview->offer->start_date}}</p>
                    @if($interview->offer->requirements)

                    <p class="text-gray-700"><span class="font-medium">Additional Requirements:</span> {{$interview->offer->requirements}}</p>
                    @endif

                </div>
                <div class="mt-5">
      <h4 class="font-medium text-gray-800">Required Skills</h4>
      
      <div class="mt-2">
        <p class="text-sm font-medium text-gray-600">Technical Skills:</p>
        <div class="mt-1 flex flex-wrap gap-2">
          @foreach($interview->offer->hardSkills as $skill)
            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">{{ $skill->name }}</span>
          @endforeach
          @foreach($interview->offer->job->hardSkills as $skill)
            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">{{ $skill->name }}</span>
          @endforeach
        </div>
      </div>
      

      <div class="mt-3">
        <p class="text-sm font-medium text-gray-600">Soft Skills:</p>
        <div class="mt-1 flex flex-wrap gap-2">
          @foreach($interview->offer->softSkills as $skill)
            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{ $skill->name }}</span>
          @endforeach
          @foreach($interview->offer->job->softSkills as $skill)
            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{ $skill->name }}</span>
          @endforeach
        </div>
      </div>


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