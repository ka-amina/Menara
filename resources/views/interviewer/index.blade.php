@extends('layouts.dashboard')
<div class="min-h-screen flex flex-col w-full">
    @section('content')
    <div class="flex-grow w-full rounded-lg  p-6">
         <!-- Stats Cards -->
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                                    <i class="fas fa-calendar-check text-white"></i>
                                </div>
                                <div class="ml-5">
                                    <h5 class="text-gray-500 text-sm">Today's Interviews</h5>
                                    <div class="flex items-center">
                                        <span class="text-2xl font-semibold">5</span>
                                        <span class="text-green-500 text-sm ml-2">
                                            <i class="fas fa-arrow-up"></i> 12%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-purple-500 rounded-full p-3">
                                    <i class="fas fa-tasks text-white"></i>
                                </div>
                                <div class="ml-5">
                                    <h5 class="text-gray-500 text-sm">Pending Tasks</h5>
                                    <div class="flex items-center">
                                        <span class="text-2xl font-semibold">12</span>
                                        <span class="text-red-500 text-sm ml-2">
                                            <i class="fas fa-arrow-up"></i> 8%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                                    <i class="fas fa-user-check text-white"></i>
                                </div>
                                <div class="ml-5">
                                    <h5 class="text-gray-500 text-sm">Candidates This Week</h5>
                                    <div class="flex items-center">
                                        <span class="text-2xl font-semibold">24</span>
                                        <span class="text-green-500 text-sm ml-2">
                                            <i class="fas fa-arrow-up"></i> 20%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-red-500 rounded-full p-3">
                                    <i class="fas fa-clipboard-check text-white"></i>
                                </div>
                                <div class="ml-5">
                                    <h5 class="text-gray-500 text-sm">Evaluations to Complete</h5>
                                    <div class="flex items-center">
                                        <span class="text-2xl font-semibold">8</span>
                                        <span class="text-yellow-500 text-sm ml-2">
                                            <i class="fas fa-minus"></i> 0%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        
                    <!-- Recruitment Progress Chart & Task Assignment -->
       
        <!-- Today's Schedule -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Today's Schedule</h2>
                    <div class="text-sm text-gray-600">
                        <span id="currentDate">Monday, 3 March 2025</span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidate</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">09:30</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Ahmed+Hassan" alt="Ahmed Hassan">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Ahmed Hassan</div>
                                            <div class="text-sm text-gray-500">ahmed.hassan@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Frontend Developer</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Technical</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-clipboard-check"></i></a>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-file-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">11:00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Sophia+Chen" alt="Sophia Chen">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Sophia Chen</div>
                                            <div class="text-sm text-gray-500">sophia.chen@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">UX Designer</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">Behavioral</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Upcoming</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-video"></i></a>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-file-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14:30</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Karim+Nouri" alt="Karim Nouri">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Karim Nouri</div>
                                            <div class="text-sm text-gray-500">karim.nouri@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Full Stack Developer</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Technical</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Upcoming</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-video"></i></a>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-file-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">16:00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Laila+Ahmed" alt="Laila Ahmed">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Laila Ahmed</div>
                                            <div class="text-sm text-gray-500">laila.ahmed@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Senior UX Designer</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Technical</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Upcoming</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-video"></i></a>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-file-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ mix('resources/js/app.js') }}"></script>
@endsection