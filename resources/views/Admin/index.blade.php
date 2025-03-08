@extends('layouts.dashboard')
<div class="min-h-screen flex flex-col w-full">
    @section('content')
    <div class="flex-grow w-full rounded-lg  p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="rounded-full bg-blue-100 p-3 mr-4">
                    <i class="fas fa-user-tie text-blue-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Total Candidates</h3>
                    <p class="text-2xl font-bold text-gray-800">142</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="rounded-full bg-green-100 p-3 mr-4">
                    <i class="fas fa-calendar-check text-green-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Scheduled Interviews</h3>
                    <p class="text-2xl font-bold text-gray-800">38</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="rounded-full bg-yellow-100 p-3 mr-4">
                    <i class="fas fa-clock text-yellow-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Pending Tasks</h3>
                    <p class="text-2xl font-bold text-gray-800">27</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="rounded-full bg-purple-100 p-3 mr-4">
                    <i class="fas fa-users text-purple-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Active Recruiters</h3>
                    <p class="text-2xl font-bold text-gray-800">8</p>
                </div>
            </div>
        </div>

        <!-- Recruitment Progress Chart & Task Assignment -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Recruitment Progress Chart -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Recruitment Progress</h2>
                <canvas id="recruitmentChart" class="w-full h-64"></canvas>
            </div>

            <!-- Recruiter Task Assignment -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Recruiter Task Assignment</h2>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none">
                        <i class="fas fa-plus mr-2"></i>Assign Task
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recruiter</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tasks</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completion</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="" alt="Sarah Johnson">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">8 Interviews / 12 Tasks</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 85%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">85%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="" alt="David Lee">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">David Lee</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">5 Interviews / 9 Tasks</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 67%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">67%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="" alt="Emma Wilson">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Emma Wilson</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">7 Interviews / 10 Tasks</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">75%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Recent Interviews & Candidates -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Interviews -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Recent Interviews</h2>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">View All</a>
                </div>
                <div class="overflow-y-auto max-h-80">
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-800">Frontend Developer - Ahmed Hassan</h3>
                                <p class="text-gray-600 text-sm">Scheduled: Today at 14:00</p>
                                <p class="text-gray-600 text-sm">Recruiter: Sarah Johnson</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-800">UX Designer - Sophia Chen</h3>
                                <p class="text-gray-600 text-sm">Scheduled: Today at 16:30</p>
                                <p class="text-gray-600 text-sm">Recruiter: David Lee</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-800">Backend Engineer - Omar Farid</h3>
                                <p class="text-gray-600 text-sm">Completed: Yesterday at 11:00</p>
                                <p class="text-gray-600 text-sm">Recruiter: Emma Wilson</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-800">Full Stack Developer - Karim Nouri</h3>
                                <p class="text-gray-600 text-sm">Completed: Yesterday at 15:00</p>
                                <p class="text-gray-600 text-sm">Recruiter: Sarah Johnson</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Candidates -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Top Candidates</h2>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">View All</a>
                </div>
                <div class="overflow-y-auto max-h-80">
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex items-start">
                            <img class="h-10 w-10 rounded-full mr-4" src="" alt="Laila Ahmed">
                            <div>
                                <h3 class="font-semibold text-gray-800">Laila Ahmed - Senior UX Designer</h3>
                                <div class="flex mt-1">
                                    <span class="text-sm text-gray-600 mr-4">Technical: 92%</span>
                                    <span class="text-sm text-gray-600">Soft Skills: 95%</span>
                                </div>
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 mt-2">Recommended</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex items-start">
                            <img class="h-10 w-10 rounded-full mr-4" src="" alt="Youssef Mansour">
                            <div>
                                <h3 class="font-semibold text-gray-800">Youssef Mansour - Backend Developer</h3>
                                <div class="flex mt-1">
                                    <span class="text-sm text-gray-600 mr-4">Technical: 90%</span>
                                    <span class="text-sm text-gray-600">Soft Skills: 85%</span>
                                </div>
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 mt-2">Recommended</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex items-start">
                            <img class="h-10 w-10 rounded-full mr-4" src="" alt="Nadia Kamal">
                            <div>
                                <h3 class="font-semibold text-gray-800">Nadia Kamal - Frontend Developer</h3>
                                <div class="flex mt-1">
                                    <span class="text-sm text-gray-600 mr-4">Technical: 88%</span>
                                    <span class="text-sm text-gray-600">Soft Skills: 92%</span>
                                </div>
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 mt-2">Recommended</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex items-start">
                            <img class="h-10 w-10 rounded-full mr-4" src="" alt="Hassan Osman">
                            <div>
                                <h3 class="font-semibold text-gray-800">Hassan Osman - DevOps Engineer</h3>
                                <div class="flex mt-1">
                                    <span class="text-sm text-gray-600 mr-4">Technical: 85%</span>
                                    <span class="text-sm text-gray-600">Soft Skills: 80%</span>
                                </div>
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 mt-2">Under Review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ mix('resources/js/app.js') }}"></script>
@endsection