@extends('layouts.dashboard')

@section('content')
@section('title', 'Menara - Edit Profile')


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
<div class="container mx-auto px-4 sm:px-8 py-6">
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-4xl mx-auto">
        <div class="p-6 border-b">
            <h1 class="text-xl font-bold text-gray-800">Edit Profile</h1>
        </div>

        <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="p-6">
                <!-- User Section -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-4 text-blue-600">User</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">username</label>
                            <input type="text" id="first_name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{$user->name}}">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{$user->email}}">
                        </div>

                        <!-- Profile Image -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Profile image</label>
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-200">
                                    <img id="profile-image-preview" src="{{ asset('storage/' . $user->avatar) }}" alt="Profile" class="w-full h-full object-cover">
                                </div>
                                <label for="profile_image" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                    Upload File
                                </label>
                                <input type="file" id="profile_image" name="avatar" class="hidden" accept="image/*" onchange="previewImage()">
                                <span id="file-name" class="text-xs text-gray-500">No file chosen</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Basic Information Section -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-4 text-blue-600">Basic</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea id="bio" name="bio" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md">{{$user->bio}}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div>
                    <h2 class="text-lg font-semibold mb-4 text-blue-600">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="{{$user->phone}}">
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

<script>
    function previewImage() {
        const fileInput = document.getElementById('profile_image');
        const fileNameElement = document.getElementById('file-name');
        const imagePreview = document.getElementById('profile-image-preview');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
            fileNameElement.textContent = fileInput.files[0].name;
        } else {
            imagePreview.src = '';
            fileNameElement.textContent = 'No file chosen';
        }
    }
</script>
@endsection