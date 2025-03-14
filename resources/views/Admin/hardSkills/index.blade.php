@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <!-- Page Title for Hardskills -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-semibold leading-tight">Hardskills</h2>
            <!-- Add New Hardskill Button -->
            <button id="openHardskillModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add New Hardskill
            </button>
        </div>

        <div id="hardskillModal" class="fixed inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Add New Hardskill</h3>
                <form action="{{ route('hardskills.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="hardskill_name" class="block text-sm text-gray-700">Hardskill Name</label>
                        <input type="text" name="name" id="hardskill_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeHardskillModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hardskills Table -->
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Hardskill Name
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($hardSkills as $hardSkill)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $hardSkill->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('hardskills.edit', $hardSkill->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('hardskills.destroy', $hardSkill->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const openModalBtn = document.getElementById("openHardskillModalBtn");
    const closeModalBtn = document.getElementById("closeHardskillModalBtn");
    const hardskillModal = document.getElementById("hardskillModal");

    openModalBtn.addEventListener("click", () => {
        hardskillModal.classList.remove("hidden");
        hardskillModal.classList.add("flex")
    });

    closeModalBtn.addEventListener("click", () => {
        hardskillModal.classList.add("hidden");
    });

    hardskillModal.addEventListener("click", (e) => {
        if (e.target === hardskillModal) {
            hardskillModal.classList.add("hidden");
        }
    });
</script>
<script src="{{ mix('resources/js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection