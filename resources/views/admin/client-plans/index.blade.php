@extends('layouts.admin')

@section('title', 'Client Plans')

@section('content')
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.client-plans.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Client Plan
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Client Name</th>
                    <th class="py-3 px-6 text-left">Plan Name</th>
                    <th class="py-3 px-6 text-left">Start Date</th>
                    <th class="py-3 px-6 text-left">End Date</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($clientPlans as $clientPlan)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $clientPlan->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $clientPlan->user->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $clientPlan->plan->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $clientPlan->start_date }}</td>
                        <td class="py-3 px-6 text-left">{{ $clientPlan->end_date }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="{{ route('admin.client-plans.edit', $clientPlan->id) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.client-plans.destroy', $clientPlan->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client plan?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $clientPlans->links() }}
        </div>
    </div>
@endsection
