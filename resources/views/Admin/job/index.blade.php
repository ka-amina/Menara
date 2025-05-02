@extends('layouts.dashboard')

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
<div class="min-h-screen flex flex-col w-full">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <!-- Page Title and Add Button -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold leading-tight">Jobs</h2>
                <div class="mb-4">
                    <input type="text" id="searchInput" placeholder="Search jobs..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button id="openAddModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add New Job
                </button>
            </div>

            <!-- Jobs Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer job-card" data-job-id="{{ $job->id }}">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $job->title }}</h3>
                        <div class="text-sm text-gray-600 mb-3">
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">{{ $job->category->name }}</span>
                        </div>
                        <p class="text-sm text-gray-700 line-clamp-2 mb-4">{{ $job->description }}</p>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-gray-500">
                                {{ $job->hardSkills->count() }} hard skills • {{ $job->softSkills->count() }} soft skills
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if ($jobs->hasPages())
            <div class="mt-10 flex justify-center">
                <div class="flex items-center space-x-2">
                    {{-- Previous Page --}}
                    @if ($jobs->onFirstPage())
                    <span class="px-3 py-2 rounded-md border border-gray-300 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $jobs->previousPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                    @if ($page == $jobs->currentPage())
                    <span class="px-4 py-2 rounded-md border border-primary bg-primary text-white">{{ $page }}</span>
                    @elseif ($page <= $jobs->currentPage() + 2 && $page >= $jobs->currentPage() - 2)
                        <a href="{{ $url }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">{{ $page }}</a>
                        @elseif ($page == $jobs->currentPage() + 3 || $page == $jobs->currentPage() - 3)
                        <span class="px-4 py-2 text-gray-500">...</span>
                        @endif
                        @endforeach

                        {{-- Next Page --}}
                        @if ($jobs->hasMorePages())
                        <a href="{{ $jobs->nextPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
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

            <!-- add job modal -->
            <div id="addJobModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg p-6 max-w-md w-full max-h-screen sm:max-h-[90vh] flex flex-col">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Add New Job</h3>

                    <div class="overflow-y-auto flex-grow">
                        <form action="{{route('jobs.store')}}" method="POST" id="addJobForm">
                            @csrf
                            <div class="mb-4">
                                <label for="job_title" class="block text-sm text-gray-700">Job Title</label>
                                <input type="text" name="title" id="job_title" value="{{ old('title') }}" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('title') ? 'border-red-500' : '' }}">
                                @if ($errors->has('title'))
                                <div class="text-red-500 mt-2">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('description') ? 'border-red-500' : '' }}"></textarea>
                                @if ($errors->has('description'))
                                <div class="text-red-500 mt-2">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="category_id" class="block text-sm text-gray-700 ">Category</label>
                                <select name="category_id" id="category_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 {{ $errors->has('description') ? 'border-red-500' : '' }}">
                                    <option value="">select category</option>
                                    @foreach($jobs as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                <div class="text-red-500 mt-2">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm text-gray-700">Hard Skills</label>
                                <div class="mt-1 grid grid-cols-2 gap-2">
                                    @foreach($hardSkills as $hardSkill)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="hard_skills[]" value="{{ $hardSkill->id }}" id="hard_skill_{{ $hardSkill->id }}" class="mr-2" {{ in_array($hardSkill->id, old('hard_skills', [])) ? 'checked' : '' }}>
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
                                        <input type="checkbox" name="soft_skills[]" value="{{ $softSkill->id }}" id="soft_skill_{{ $softSkill->id }}" class="mr-2" {{ in_array($softSkill->id, old('soft_skills', [])) ? 'checked' : '' }}>
                                        <label for="soft_skill_{{ $softSkill->id }}" class="text-sm">{{ $softSkill->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex justify-end space-x-2 mt-6 pt-4 border-t border-gray-200">
                        <button type="button" id="closeAddModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                        <button type="submit" form="addJobForm" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
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
                        <form id="deleteJobForm" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="deleteJobButton" class="bg-red-600 hover:bg-red-900  text-white text-sm px-4 py-2 rounded-md delete-job">Delete</button>
                        </form>
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

        const hasErrors = JSON.parse("@json($errors->any())");
        if (hasErrors) {
            addJobModal.classList.remove('hidden');
            addJobModal.classList.add('flex');
        }

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

                    const deleteForm = jobDetailsModal.querySelector("form");
                    deleteForm.action = `http://localhost:8000/jobs/${jobId}`;

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
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById("searchInput");
        const jobGrid = document.querySelector(".grid");

        let debounceTimer;
        searchInput.addEventListener("input", () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const keyword = searchInput.value.trim();
                fetchJobs(keyword);
            }, 300);
        });

        async function fetchJobs(keyword = "") {
            try {
                const response = await fetch(`/api/jobs?search=${encodeURIComponent(keyword)}`);
                const jobs = await response.json();

                jobGrid.innerHTML = "";

                jobs.forEach(job => {
                    const card = document.createElement("div");
                    card.className = "bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer job-card";
                    card.setAttribute("data-job-id", job.id);

                    card.innerHTML = `
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">${job.title}</h3>
                        <div class="text-sm text-gray-600 mb-3">
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">${job.category.name}</span>
                        </div>
                        <p class="text-sm text-gray-700 line-clamp-2 mb-4">${job.description}</p>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-gray-500">
                                ${job.hard_skills.length} hard skills • ${job.soft_skills.length} soft skills
                            </div>
                        </div>
                    </div>
                `;

                    jobGrid.appendChild(card);
                });

            } catch (error) {
                console.error("Error fetching jobs:", error);
            }
        }
    });
</script>

@endsection