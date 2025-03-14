@extends('layouts.dashboard')
<div class="min-h-screen flex flex-col w-full">
    @section('content')
    <div id="categoryModal" class="fixed flex inset-0 justify-center items-center bg-gray-500 bg-opacity-50 z-50 ">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Edit Hardskill: name</h3>
                <form action="{{route('hardskills.update',$hardSkill->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="category_name" class="block text-sm text-gray-700">skill Name</label>
                        <input type="text" name="name" id="category_name" class="mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $hardSkill->name }}" >
                        @if ($errors->has('name'))
                    <div class="text-red-500 mt-2">{{ $errors->first('name') }}</div>
                    @endif
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400"><a href="{{route('hardskills')}}">Cancel</a></button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
@section('scripts')
<script src="{{ mix('resources/js/app.js') }}"></script>
<script>
    const input =document.getElementById('category_name');
    const hasErrors = JSON.parse("@json($errors->any())");
    if (hasErrors) {
        input.classList.add('border-red-500')
        modal.classList.remove('hidden');
        modal.classList.add('flex');

    }
</script>
@endsection