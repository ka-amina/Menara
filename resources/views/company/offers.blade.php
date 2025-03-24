@extends('layouts.dashboard')

@section('content')

<div class="min-h-screen flex flex-col w-full">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold leading-tight">Offers</h2>
                <button id="openAddModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Add New offer
                </button>
            </div>

            <!-- Jobs Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($offers as $offer)
                <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer offer-card" data-job-id="{{ $offer->id }}">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $offer->job->title }}</h3>
                        <div class="text-sm text-gray-600 mb-3">
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">{{ $offer->status }}</span>
                        </div>
                        <p class="text-sm text-gray-700  mb-4">{{ $offer->job->description }}</p>
                        <div class="flex justify-between items-center">
                            requirements
                        </div>
                        <p class="text-sm text-gray-700 line-clamp-2 mb-4">{{ $offer->requirements }}</p>
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

                            <div class="mb-4" id="job-id-select">
                                <label for="job_id" class="block text-sm text-gray-700">Select Job</label>
                                <select name="job_id" id="job_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">select job</option>
                                    @foreach($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- job details -->
                            <div id="jobDetailsModal" class="hidden">
                                <div class="bg-white rounded-lg p-6 max-w-lg w-full">
                                    <div class="flex justify-between items-start mb-4">
                                        <h3 id="modal-job-title" class="text-xl font-semibold text-gray-800"></h3>
                                        <button id="closeDetailsModalBtn" class="text-gray-500 hover:text-gray-700">

                                        </button>
                                    </div>
                                    <div class="mb-4">
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
                                </div>
                            </div>

                            <div>
                                <button id="new-job-btn" class=" border-dotted border-2 border-blue-500  px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full hover:text-white"> add new job</button>
                            </div>

                            <div id="new-job-form" class="hidden">
                                <div class="mb-4">
                                    <label for="job_title" class="block text-sm text-gray-700">Job Title</label>
                                    <input type="text" name="title" id="job_title" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <label for="job_description" class="block text-sm text-gray-700">Description</label>
                                    <textarea name="job_description" id="job_description" rows="3" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="category_id" class="block text-sm text-gray-700">Category</label>
                                    <select name="category_id" id="category_id" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm text-gray-700">Hard Skills</label>
                                    <div class="mt-1 grid grid-cols-2 gap-2">
                                        @foreach($hardSkills as $hardSkill)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="job_hard_skills[]" value="{{ $hardSkill->id }}" id="hard_skill_{{ $hardSkill->id }}" class="mr-2">
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
                                            <input type="checkbox" name="job_soft_skills[]" value="{{ $softSkill->id }}" id="soft_skill_{{ $softSkill->id }}" class="mr-2">
                                            <label for="soft_skill_{{ $softSkill->id }}" class="text-sm">{{ $softSkill->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button id="cancel-new-job" class="hidden bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 w-full">cancel</button>
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
            <div id="offerDetailsModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg p-6 max-w-3xl w-full max-h-[90vh] overflow-hidden flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <h3 id="modal-offer-title" class="text-xl font-semibold text-gray-800"></h3>
                        <button id="closeDetailsModalBtn1" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>


                    <div class="overflow-y-auto pr-2" style="max-height: 70vh;">
                        <div id="company-info-section" class="mb-6 p-4  rounded-lg">
                            <h4 class="text-md font-semibold text-gray-800 mb-3">Company Information</h4>
                            <div class="flex items-start">
                                <img id="modal-company-logo" src="" alt="Company Logo" class="w-16 h-16 object-cover rounded-full mr-4 hidden">
                                <div class="flex-1">
                                    <h5 id="modal-company-name" class="text-sm font-medium text-gray-800 mb-1"></h5>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                                        <div>
                                            <h6 class="text-xs font-semibold text-gray-700">Contact</h6>
                                            <p id="modal-company-phone" class="text-sm text-gray-700"></p>
                                            <p id="modal-company-email" class="text-sm text-gray-700"></p>
                                        </div>
                                        <div>
                                            <h6 class="text-xs font-semibold text-gray-700">Address</h6>
                                            <p id="modal-company-address" class="text-sm text-gray-700"></p>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <h6 class="text-xs font-semibold text-gray-700">Description</h6>
                                        <p id="modal-company-description" class="text-sm text-gray-700"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <span id="modal-category" class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs"></span>
                            <p id="modal-offer-description" class="text-sm text-gray-700 mt-2"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Level</h4>
                            <p id="modal-offer-level" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Location</h4>
                            <p id="modal-offer-location" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Requirements</h4>
                            <p id="modal-offer-requirements" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Start Date</h4>
                            <p id="modal-offer-start-date" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Contract Type</h4>
                            <p id="modal-offer-contract-type" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">Status</h4>
                            <p id="modal-offer-status" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800">About Offer</h4>
                            <p id="modal-offer-about" class="text-sm text-gray-700"></p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800 mb-2">Hard Skills</h4>
                            <div id="modal-offer-hard-skills" class="flex flex-wrap gap-2"></div>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-800 mb-2">Soft Skills</h4>
                            <div id="modal-offer-soft-skills" class="flex flex-wrap gap-2"></div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 mt-4">
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
    const jobSelect = document.getElementById("job_id");
    const jobDetailsModal = document.getElementById("jobDetailsModal");
    const closeDetailsModalBtn = document.getElementById("closeDetailsModalBtn");

    jobSelect.addEventListener("change", function() {
        const jobId = jobSelect.value;
        // console.log(jobSelect.value);
        if (jobId) {
            fetchJobDetails(jobId);
        }
    });

    async function fetchJobDetails(jobId) {
        try {
            console.log("Fetching job details for ID:", jobId);
            const response = await fetch(`/api/jobs/${jobId}`);
            console.log("Raw response:", response);

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const jobDetails = await response.json();
            console.log("Job details received:", jobDetails);

            document.getElementById("modal-job-title").innerText = jobDetails.title || '';
            document.getElementById("modal-description").innerText = jobDetails.description || '';

            const hardSkillsContainer = document.getElementById("modal-hard-skills");
            hardSkillsContainer.innerHTML = '';

            if (jobDetails.hard_skills && Array.isArray(jobDetails.hard_skills)) {
                jobDetails.hard_skills.forEach(skill => {
                    const skillElement = document.createElement('span');
                    skillElement.classList.add('bg-blue-100', 'text-blue-800', 'px-2', 'py-1', 'rounded-full', 'text-xs');
                    skillElement.innerText = typeof skill === 'object' ? skill.name : skill;
                    hardSkillsContainer.appendChild(skillElement);
                });
            }

            const softSkillsContainer = document.getElementById("modal-soft-skills");
            softSkillsContainer.innerHTML = '';

            if (jobDetails.soft_skills && Array.isArray(jobDetails.soft_skills)) {
                jobDetails.soft_skills.forEach(skill => {
                    const skillElement = document.createElement('span');
                    skillElement.classList.add('bg-green-100', 'text-green-800', 'px-2', 'py-1', 'rounded-full', 'text-xs');
                    skillElement.innerText = typeof skill === 'object' ? skill.name : skill;
                    softSkillsContainer.appendChild(skillElement);
                });
            }

            const jobDetailsModal = document.getElementById("jobDetailsModal");
            jobDetailsModal.classList.remove('hidden');
        } catch (error) {
            console.error("Error fetching job details:", error);
            alert("There was an error loading the job details.");
        }
    }


    closeDetailsModalBtn.addEventListener("click", function() {
        jobDetailsModal.classList.add('hidden');
    });


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


    const mewJob = document.getElementById("new-job-btn");
    const newJobForm = document.getElementById("new-job-form");
    const jobSelected = document.getElementById("job-id-select");
    const cancelJob = document.getElementById("cancel-new-job");
    const jobIdSelect = document.getElementById("job_id");

    mewJob.addEventListener("click", (e) => {
        e.preventDefault();
        jobIdSelect.value = '';
        newJobForm.classList.remove('hidden');
        jobDetailsModal.classList.add('hidden');
        jobSelected.classList.add('hidden');
        mewJob.classList.add('hidden');
        cancelJob.classList.remove('hidden');

    });

    cancelJob.addEventListener("click", (e) => {
        e.preventDefault();
        newJobForm.classList.add('hidden');
        jobSelected.classList.remove('hidden');
        mewJob.classList.remove('hidden');
        cancelJob.classList.add('hidden');
        document.getElementById('job_title').value = '';
        document.getElementById('job_description').value = '';
        document.getElementById('category_id').value = '';

        const softSkills = document.querySelectorAll("input[name='job_soft_skills[]']");
        softSkills.forEach((element) => {
            element.checked = false;
        })

        const hardSkills = document.querySelectorAll("input[name='job_hard_skills[]']");
        hardSkills.forEach((element) => {
            element.checked = false;
        })

    })


    const offerCard = document.querySelectorAll('.offer-card');
    const offerDetailsModal = document.getElementById("offerDetailsModal");
    const closeDetailsBtn = document.getElementById("close-details-btn");
    const closeDetailsModalBtn1 = document.getElementById("closeDetailsModalBtn1");

    closeDetailsModalBtn1.addEventListener("click", () => {
        offerDetailsModal.classList.add("hidden");
        offerDetailsModal.classList.remove("flex");
    });

    closeDetailsBtn.addEventListener("click", () => {
        offerDetailsModal.classList.add("hidden");
        offerDetailsModal.classList.remove("flex");
    });

    offerDetailsModal.addEventListener("click", (e) => {
        if (e.target === offerDetailsModal) {
            offerDetailsModal.classList.add("hidden");
            offerDetailsModal.classList.remove("flex");
        }
    });

    offerCard.forEach(card => {
        card.addEventListener("click", (e) => {
            const offerId = card.dataset.jobId;
            console.log("Clicked on offer with ID:", offerId);
            fetchOfferDetails(offerId);
        });
    });

    async function fetchOfferDetails(offerId) {
        try {
            const response = await fetch(`/api/offers/${offerId}`);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();
            console.log("Offer details received:", data);

            document.getElementById("modal-offer-title").innerText = data.job.title;
            document.getElementById("modal-category").innerText = data.job.category.name;
            document.getElementById("modal-offer-description").innerText = data.job.description;
            document.getElementById("modal-offer-level").innerText = data.level;
            document.getElementById("modal-offer-location").innerText = `${data.location} (${data.location_type})`;
            document.getElementById("modal-offer-requirements").innerText = data.requirements;
            document.getElementById("modal-offer-start-date").innerText = data.start_date;
            document.getElementById("modal-offer-contract-type").innerText = data.contract_type;
            document.getElementById("modal-offer-status").innerText = data.status;
            document.getElementById("modal-offer-about").innerText = data.about_offer;
            document.getElementById("modal-company-name").innerText = data.company.user.name;
            document.getElementById("modal-company-email").innerText = data.company.user.email;
            document.getElementById("modal-company-description").innerText = data.company.description;
            document.getElementById("modal-company-address").innerText = data.company.address;
            document.getElementById("modal-company-logo").src = `/storage/${data.company.user.avatar}`;
            document.getElementById("modal-company-logo").classList.remove("hidden");
            document.getElementById("company-info-section").classList.remove("hidden");

            const hardSkillsContainer = document.getElementById("modal-offer-hard-skills");
            hardSkillsContainer.innerHTML = '';
            if (data.hard_skills.length) {
                data.hard_skills.forEach(skill => {
                    const skillElement = document.createElement('span');
                    skillElement.classList.add('bg-blue-100', 'text-blue-800', 'px-2', 'py-1', 'rounded-full', 'text-xs', 'mb-2', 'mr-2');
                    skillElement.innerText = skill.name;
                    hardSkillsContainer.appendChild(skillElement);
                });
            }

            const softSkillsContainer = document.getElementById("modal-offer-soft-skills");
            softSkillsContainer.innerHTML = '';
            if (data.soft_skills?.length) {
                data.soft_skills.forEach(skill => {
                    const skillElement = document.createElement('span');
                    skillElement.classList.add('bg-green-100', 'text-green-800', 'px-2', 'py-1', 'rounded-full', 'text-xs', 'mb-2', 'mr-2');
                    skillElement.innerText = skill.name;
                    softSkillsContainer.appendChild(skillElement);
                });
            }
            const offerDetailsModal = document.getElementById("offerDetailsModal");
            offerDetailsModal.classList.remove("hidden");
            offerDetailsModal.classList.add("flex");
        } catch (error) {
            console.error("Error fetching offer details:", error);
            alert("There was an error loading the offer details.");
        }
    }
</script>


@endsection