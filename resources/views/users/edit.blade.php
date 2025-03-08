@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8 py-6">
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-4xl mx-auto">
        <div class="p-6 border-b">
            <h1 class="text-xl font-bold text-gray-800">Edit Profile</h1>
        </div>
        
        <form >
        
            
            <div class="p-6">
                <!-- User Section -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-4 text-blue-600">User</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="Mehdi">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="Alaoui">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="mehdi.alaoui@menara-recruit.com">
                        </div>
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="malaoui">
                        </div>
                        
                        <!-- Profile Image -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Profile image</label>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200">
                                    <img src="" alt="Profile" class="w-full h-full object-cover">
                                </div>
                                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Upload File
                                </button>
                                <span class="text-xs text-gray-500">No file chosen</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Basic Information Section -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-4 text-blue-600">Basic</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="work" class="block text-sm font-medium text-gray-700 mb-1">Work</label>
                            <input type="text" id="work" name="work" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="Senior Recruiter">
                        </div>
                        <div class="md:col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea id="bio" name="bio" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md">Senior Recruiter with 8+ years of experience in tech talent acquisition. Specialized in identifying and recruiting top-tier developers and IT professionals. Passionate about building strong technical teams and creating effective hiring strategies.</textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information Section -->
                <div>
                    <h2 class="text-lg font-semibold mb-4 text-blue-600">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="+212 612-345678">
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                            <input type="text" id="location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="Casablanca, Morocco">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-100 flex justify-end">
                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save Profile Information
                </button>
            </div>
        </form>
    </div>
</div>
@endsection