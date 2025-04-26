<div class="relative flex">

    <div id="sidebar" class="bg-[#2c3e50] text-white w-16 transition-all duration-300">

        <div class="p-4 flex items-center">
            <div class="flex items-center group relative">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-xl font-bold">L</span>
                </div>
                <span class="ml-3 font-semibold text-xl sidebar-text hidden">Logo</span>
            </div>
        </div>


        <nav class="mt-4">

            @can('isInterviewer')
            <a href="{{ route('dashboard') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-tachometer-alt w-5"></i>
                <span class="ml-4 sidebar-text hidden">Dashboard</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Dashboard
                </div>
            </a>
            @endcan
            @can('isAdmin')
            <a href="{{ route('dashboard') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-tachometer-alt w-5"></i>
                <span class="ml-4 sidebar-text hidden">Dashboard</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Dashboard
                </div>
            </a>
            <a href="{{ route('categories') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-th-large w-5"></i>
                <span class="ml-4 sidebar-text hidden">Categories</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Categories
                </div>
            </a>


            <a href="{{ route('softskills') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-comments w-5"></i>
                <span class="ml-4 sidebar-text hidden">Soft Skills</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Soft Skills
                </div>
            </a>
            <a href="{{ route('hardskills') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-code w-5"></i>
                <span class="ml-4 sidebar-text hidden">Hard Skills</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Hard Skills
                </div>
            </a>
            @endcan
            <!-- <a href="{{ route('inclined') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-thumbs-up w-5"></i>
                <span class="ml-4 sidebar-text hidden">Inclined</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Inclined
                </div>
            </a>
            <a href="{{ route('declined') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-thumbs-down w-5"></i>
                <span class="ml-4 sidebar-text hidden">Declined</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Declined
                </div>
            </a> -->
            @can('canAccessCandidatesAndInterviews')
            <a href="{{route('candidates')}}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-user-tie w-5"></i>
                <span class="ml-4 sidebar-text hidden">Candidates</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Candidates
                </div>
            </a>
            @endcan


            @can('isAdmin')
            <a href="{{route('jobs')}}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-briefcase w-5"></i>
                <span class="ml-4 sidebar-text hidden">Jobs</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Jobs
                </div>
            </a>
            @endcan

            @can('canAccessCandidatesAndInterviews')
            <a href="{{route('evaluations')}}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-user-check w-5"></i>
                <span class="ml-4 sidebar-text hidden">Interviews</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Interviews
                </div>
            </a>
            @endcan
            <!-- <a href="{{route('questions')}}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-question-circle w-5"></i>
                <span class="ml-4 sidebar-text hidden">Questions</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Questions
                </div>
            </a> -->

            <a href="{{route('offers.show')}}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-tags w-5"></i>
                <span class="ml-4 sidebar-text hidden">Offers</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Offers
                </div>
            </a>

            @can('isAdmin')
            <a href="{{route('users')}}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-users w-5"></i>
                <span class="ml-4 sidebar-text hidden">Users</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    Users
                </div>
            </a>
            @endcan

            <a href="{{ route('logout') }}" class="group relative flex items-center p-4 hover:bg-gray-700 transition-colors">
                <i class="fas fa-sign-out-alt w-5"></i> <!-- Changed to 'fa-sign-out-alt' for a logout icon -->
                <span class="ml-4 sidebar-text hidden">logout</span>
                <div class="tooltip-element absolute left-full ml-2 px-2 py-1 bg-gray-900 text-sm rounded-md whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                    logout
                </div>
            </a>


        </nav>
    </div>

    <!-- Toggle Button - Now outside sidebar -->
    <button id="toggleButton" class="absolute -right-3 top-6 bg-gray-800 text-white p-1.5 rounded-full hover:bg-gray-700 transition-colors shadow-lg">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>