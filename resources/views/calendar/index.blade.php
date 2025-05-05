@extends('layouts.dashboard')

@section('title', 'Menara - Calendar')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div id="calendar"></div>
</div>

<!-- interview modal -->
<div id="interviewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-lg font-medium text-gray-900" id="interviewModalLabel">Interview Details</h3>
                <button type="button" class="text-gray-400 hover:text-gray-500" id="closeModal">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="interviewModalBody" class="mt-2">
                <div class="flex justify-center">
                    <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" id="closeModalBtn" class="px-4 py-2 bg-gray-200 text-gray-800 text-base font-medium rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var interviews = <?php echo json_encode($events); ?>;


        const interviewModal = document.getElementById('interviewModal');
        const closeModal = document.getElementById('closeModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const interviewModalBody = document.getElementById('interviewModalBody');

        // show modal
        function showModal() {
            interviewModal.classList.remove('hidden');
        }

        //hide modal
        function hideModal() {
            interviewModal.classList.add('hidden');
        }

        closeModal.addEventListener('click', hideModal);
        closeModalBtn.addEventListener('click', hideModal);

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === interviewModal) {
                hideModal();
            }
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            events: interviews,
            selectable: true,
            selectHelper: true,
            eventRender: function(event, element) {
                element.css('cursor', 'pointer');
            },
            eventClick: async function(calEvent, jsEvent, view) {
                showModal();

                try {
                    const interviewId = calEvent.id;

                    const response = await fetch(`/api/interviews/${interviewId}`);

                    if (!response.ok) {
                        throw new Error('Failed to fetch interview details');
                    }

                    const data = await response.json();


                    const date = new Date(data.scheduled_at);
                    const formattedDate = date.toLocaleDateString('en-GB', {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });

                    let modalContent = `
                    <div class="interview-details">
                        <p><strong>Interviewer:</strong> ${data.interviewer.name}</p>
                        <p><strong>Candidate:</strong> ${data.candidate.first_name} ${data.candidate.last_name}</p>
                        <p><strong>Date:</strong> ${formattedDate}</p>
                        <p><strong>Time:</strong> ${data.start_time} - ${data.end_time}</p>
                        <p><strong>Meeting Link:</strong> ${data.meeting_link ? `<a href="${data.meeting_link}" target="_blank" class="text-blue-600 hover:underline">Click here</a>` : 'No link available'}</p>
                        <p><strong>Status:</strong> <span class="${
                            data.candidate.status === 'pending' ? 'text-yellow-600 bg-yellow-100 px-2 py-1 rounded' : 
                            data.candidate.status === 'accepted' ? 'text-green-600 bg-green-100 px-2 py-1 rounded' : 
                            data.candidate.status === 'rejected' ? 'text-red-600 bg-red-100 px-2 py-1 rounded' : 
                            'text-gray-600'
                        }">${data.candidate.status}</span></p>
                    </div>
                `;


                    interviewModalBody.innerHTML = modalContent;

                } catch (error) {
                    console.error('Error fetching interview details:', error);
                    interviewModalBody.innerHTML = `
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        Failed to load interview details. Please try again.
                    </div>
                `;
                }
            }
        });
    });
</script>
@endsection