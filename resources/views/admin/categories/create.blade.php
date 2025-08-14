@extends('layouts.admin')

@section('title', 'Create New Category')

@section('content')
<form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
    @csrf
    <div class="space-y-4">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mt-6 flex justify-end space-x-4">
        <a href="{{ route('admin.categories.index') }}" class="btn-secondary py-2 px-4">Cancel</a>
        <button type="submit" class="btn-primary py-2 px-4">Save Category</button>
    </div>
</form>
@endsection
