@extends('layouts.dashboard')
@section('title', 'Menara - Evaluation')

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
                <h3 id="evaluateh" class="text-xl font-semibold text-gray-800">Évaluation du Candidat</h3>

                @if (!$result)
                @if(Auth::user()->id === $interview->interviewer_id)
                <form method="POST" action="{{ route('evaluations.store') }}">
                    @csrf
                    <input type="hidden" name="candidate_id" value="{{ $interview->candidate->id }}">
                    <input type="hidden" name="offer_id" value="{{ $interview->offer->id }}">

                    <div class="mt-4">
                        <label class="block text-gray-700 font-semibold mb-2">
                            Does this profile meet the required criteria for this position?
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio text-blue-600" name="criteria_met" value="1">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio text-red-600" name="criteria_met" value="0">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                        @error('criteria_met')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label class="block text-gray-700 font-semibold mb-2">
                            Justification for the decision:
                        </label>
                        <textarea name="decision_justification" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('decision_justification') border-red-500 @enderror"></textarea>
                        @error('decision_justification')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Submit
                        </button>
                    </div>
                </form>
                @else
                <div class="mt-6 text-yellow-600 font-semibold">
                    This candidate hasn't been evaluated yet.
                </div>
                @endif
                @else
                <div id="candidate-result">
                    <div class="mt-4">
                        <p class="text-gray-700">
                            <strong>Criteria Met:</strong>
                            {{ $result->profile_validated === 1 ? 'Yes' : 'No' }}
                        </p>

                    </div>

                    <div class="mt-4">
                        <p class="text-gray-700"><strong>Decision Justification:</strong></p>
                        <p class="mt-2 text-gray-600">{{ $result->decision_justification }}</p>
                    </div>
                    @can('isInterviewer')
                    <div class="flex  justify-end ">
                        <button id="edit-btn" class=" bg-blue-500 text-white p-2 rounded-md">edit</button>
                    </div>
                    @endcan
                </div>

                <div id="edit-form" class="hidden">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Évaluation du Candidat</h3>

                    <form method="POST" action="{{ route('evaluations.update',$result->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="candidate_id" value="{{ $interview->candidate->id }}">
                        <input type="hidden" name="offer_id" value="{{ $interview->offer->id }}">

                        <div class="mt-4">
                            <label class="block text-gray-700 font-semibold mb-2">
                                Does this profile meet the required criteria for this position?
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio text-blue-600" name="criteria_met" value="1"
                                        @if($result && $result->profile_validated == 1) checked @endif>
                                    <span class="ml-2">Yes</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio text-red-600" name="criteria_met" value="0"
                                        @if($result && $result->profile_validated == 0) checked @endif>
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-gray-700 font-semibold mb-2">
                                Justification for the decision:
                            </label>
                            <textarea name="decision_justification" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $result->decision_justification  }}</textarea>
                        </div>

                        <div class="mt-6 flex justify-end">

                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Submit
                            </button>
                        </div>
                    </form>
                    <div class="flex justify-end mt-2">
                        <button id="cancel-btn" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 ">
                            cancel
                        </button>
                    </div>
                </div>
                @endif
            </div>




        </div>
    </div>

    <script>
        const evaluateh = document.getElementById("evaluateh");
        const editbtn = document.getElementById("edit-btn");
        const editForm = document.getElementById("edit-form");
        const candidateResult = document.getElementById("candidate-result");
        const cancelbtn = document.getElementById("cancel-btn");
        editbtn.addEventListener('click', function() {
            editForm.classList.remove('hidden');
            candidateResult.classList.add('hidden');
            evaluateh.classList.add("hidden")

        });
        cancelbtn.addEventListener('click', function() {
            editForm.classList.add('hidden');
            candidateResult.classList.remove('hidden');
            evaluateh.classList.remove("hidden")

        });
    </script>
    @endsection