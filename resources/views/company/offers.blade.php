@extends('layouts.app')

@section('content')

<div class="min-h-screen flex flex-col w-full">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <!-- Page Title and Add Button -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold leading-tight">Jobs</h2>
                <button id="openAddModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add New offer
                </button>
            </div>

            <!-- Jobs Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($offers as $job)
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer job-card" data-job-id="{{ $job->id }}">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $job->contract_type }}</h3>
                        <div class="text-sm text-gray-600 mb-3">
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">{{ $job->status }}</span>
                        </div>
                        <p class="text-sm text-gray-700 line-clamp-2 mb-4">{{ $job->description }}</p>
                        <div class="flex justify-between items-center">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- add job modal -->
            <div id="addJobModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg p-6 max-w-2xl w-full max-h-screen sm:max-h-[90vh] flex flex-col">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Add New Job</h3>

                    <div class="overflow-y-auto flex-grow">
                        <form action="{{route('offers.store')}}" method="POST" id="addOfferForm">
                            @csrf
                            <!-- Job Title section - already existing -->
                            <div class="mb-4">
                                <label for="job_id" class="block text-sm text-gray-700">Select Job</label>
                                <select name="job_id" id="job_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">select job</option>
                                    @foreach($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-4">
                                <label for="level" class="block text-sm text-gray-700">Experience Level</label>
                                <select name="level" id="level" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="junior">Junior</option>
                                    <option value="mid">Mid-level</option>
                                    <option value="senior">Senior</option>
                                    <option value="lead">Lead</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="location" class="block text-sm text-gray-700">Location</label>
                                <input type="text" name="location" id="location" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="location_type" class="block text-sm text-gray-700">Location Type</label>
                                <select name="location_type" id="location_type" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="onsite">On-site</option>
                                    <option value="remote">Remote</option>
                                    <option value="hybrid">Hybrid</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="requirements" class="block text-sm text-gray-700">Requirements</label>
                                <textarea name="requirements" id="requirements" rows="3" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="start_date" class="block text-sm text-gray-700">Start Date</label>
                                <select name="start_date" id="start_date" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="flexible">Flexible</option>
                                    <option value="immediately">Immediately</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="contract_type" class="block text-sm text-gray-700">Contract Type</label>
                                <select name="contract_type" id="contract_type" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="internship">Internship</option>
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                </select>
                            </div>


                            <div class="mb-4">
                                <label for="about_offer" class="block text-sm text-gray-700">About This Offer</label>
                                <textarea name="about_offer" id="about_offer" rows="3" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm text-gray-700">Hard Skills</label>
                                <div class="mt-1 grid grid-cols-2 gap-2">
                                    @foreach($hardSkills as $hardSkill)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="hard_skills[]" value="{{ $hardSkill->id }}" id="hard_skill_{{ $hardSkill->id }}" class="mr-2">
                                        <label for="hard_skill_{{ $hardSkill->id }}" class="text-sm">{{ $hardSkill->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm text-gray-700">Soft Skills</label>
                                <div class="mt-1 grid grid-cols-2 gap-2">
                                    @foreach($softSkills as $softSkill)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="soft_skills[]" value="{{ $softSkill->id }}" id="soft_skill_{{ $softSkill->id }}" class="mr-2">
                                        <label for="soft_skill_{{ $softSkill->id }}" class="text-sm">{{ $softSkill->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex justify-end space-x-2 mt-6 pt-4 border-t border-gray-200">
                        <button type="button" id="closeAddModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                        <button type="submit" form="addOfferForm" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                    </div>
                </div>
            </div>

            <!-- job details -->
            <div id="jobDetailsModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg p-6 max-w-lg w-full">
                    <div class="flex justify-between items-start mb-4">
                        <h3 id="modal-job-title" class="text-xl font-semibold text-gray-800"></h3>
                        <button id="closeDetailsModalBtn" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mb-4">
                        <div class="text-sm text-gray-600 mb-2">
                            <span id="modal-category" class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs"></span>
                        </div>
                        <p id="modal-description" class="text-sm text-gray-700 mb-4"></p>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-800 mb-2">Hard Skills</h4>
                        <div id="modal-hard-skills" class="flex flex-wrap gap-2"></div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-800 mb-2">Soft Skills</h4>
                        <div id="modal-soft-skills" class="flex flex-wrap gap-2"></div>
                    </div>

                    <div class="flex justify-end space-x-2 mt-6">
                        <button id="close-details-btn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openAddModalBtn = document.getElementById("openAddModalBtn");
        const closeAddModalBtn = document.getElementById("closeAddModalBtn");
        const addJobModal = document.getElementById("addJobModal");

        openAddModalBtn.addEventListener("click", () => {
            addJobModal.classList.remove("hidden");
            addJobModal.classList.add("flex");
        });

        closeAddModalBtn.addEventListener("click", () => {
            addJobModal.classList.add("hidden");
            addJobModal.classList.remove("flex");
        });

        addJobModal.addEventListener("click", (e) => {
            if (e.target === addJobModal) {
                addJobModal.classList.add("hidden");
                addJobModal.classList.remove("flex");
            }
        });

        // Job Details 
        const jobDetailsModal = document.getElementById("jobDetailsModal");
        const closeDetailsModalBtn = document.getElementById("closeDetailsModalBtn");
        const closeDetailsBtn = document.getElementById("close-details-btn");
        const jobCards = document.querySelectorAll(".job-card");

        // Close details 
        closeDetailsModalBtn.addEventListener("click", () => {
            jobDetailsModal.classList.add("hidden");
            jobDetailsModal.classList.remove("flex");
        });

        closeDetailsBtn.addEventListener("click", () => {
            jobDetailsModal.classList.add("hidden");
            jobDetailsModal.classList.remove("flex");
        });

        jobDetailsModal.addEventListener("click", (e) => {
            if (e.target === jobDetailsModal) {
                jobDetailsModal.classList.add("hidden");
                jobDetailsModal.classList.remove("flex");
            }
        });

        // Job card click to show details
        jobCards.forEach(card => {
            card.addEventListener("click", (e) => {

                const jobId = card.dataset.jobId;

                fetchJobDetails(jobId).then(data => {
                    document.getElementById("modal-job-title").textContent = data.title;
                    document.getElementById("modal-category").textContent = data.category.name;
                    document.getElementById("modal-description").textContent = data.description;

                    // Hard skills
                    const hardSkillsContainer = document.getElementById("modal-hard-skills");
                    hardSkillsContainer.innerHTML = '';
                    data.hard_skills.forEach(skill => {
                        const skillTag = document.createElement("span");
                        skillTag.className = "inline-block bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs";
                        skillTag.textContent = skill.name;
                        hardSkillsContainer.appendChild(skillTag);
                    });

                    // Soft skills
                    const softSkillsContainer = document.getElementById("modal-soft-skills");
                    softSkillsContainer.innerHTML = '';
                    data.soft_skills.forEach(skill => {
                        const skillTag = document.createElement("span");
                        skillTag.className = "inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs";
                        skillTag.textContent = skill.name;
                        softSkillsContainer.appendChild(skillTag);
                    });

                    // Show modal
                    jobDetailsModal.classList.remove("hidden");
                    jobDetailsModal.classList.add("flex");
                });
            });
        });



        function fetchJobDetails(jobId) {
            return fetch(`/api/jobs/${jobId}`)
                .then(response => response.json())
                .catch(error => {
                    console.error('Error fetching job details:', error);
                    alert('An error occurred while loading job details');
                });
        }
    });
</script>


@endsection