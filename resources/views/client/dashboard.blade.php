@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-2xl font-bold mb-4">Paket Aktif</h2>
            @if($activePlans->count() > 0)
                <div class="grid grid-cols-1 gap-6">
                    @foreach($activePlans as $plan)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $plan->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-800 font-bold">Rp {{ number_format($plan->price, 0, ',', '.') }}</span>
                                <span class="text-green-500 font-bold">Aktif</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Anda tidak memiliki paket aktif saat ini.</p>
            @endif
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-4">Riwayat Pembelian</h2>
            @if($expiredPlans->count() > 0)
                <div class="grid grid-cols-1 gap-6">
                    @foreach($expiredPlans as $plan)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $plan->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-800 font-bold">Rp {{ number_format($plan->price, 0, ',', '.') }}</span>
                                <span class="text-red-500 font-bold">Kadaluarsa</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Anda tidak memiliki riwayat pembelian.</p>
            @endif
        </div>
    </div>
</div>
@endsection