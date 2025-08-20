<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Plan;

class PlanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $plans = Plan::all();

        foreach ($plans as $plan) {
            $user->plans()->attach($plan->id, ['status' => 'active']);
        }

        $user->plans()->attach(1, ['status' => 'expired']);
    }
}