@extends('layouts.admin')

@section('title', 'Client Plan Details')

@section('content')
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Client Name:</label>
            <p class="text-gray-700 text-base">{{ $clientPlan->user->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Client Email:</label>
            <p class="text-gray-700 text-base">{{ $clientPlan->user->email }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Plan Name:</label>
            <p class="text-gray-700 text-base">{{ $clientPlan->plan->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
            <p class="text-gray-700 text-base">{{ $clientPlan->start_date }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
            <p class="text-gray-700 text-base">{{ $clientPlan->end_date }}</p>
        </div>
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.client-plans.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Back to List
            </a>
        </div>
    </div>
@endsection
