<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic',
                'price' => 100000,
                'description' => '3x Pertemuan',
                'for_who' => 'For Individuals',
                'features' => [
                    'Feature 1 for Basic',
                    'Feature 2 for Basic',
                    'Feature 3 for Basic',
                ]
            ],
            [
                'name' => 'Business',
                'price' => 250000,
                'description' => '5x Pertemuan',
                'for_who' => 'For Small Teams',
                'features' => [
                    'Feature 1 for Business',
                    'Feature 2 for Business',
                    'Feature 3 for Business',
                    'Feature 4 for Business',
                ]
            ],
            [
                'name' => 'Enterprise',
                'price' => 500000,
                'description' => '10x Pertemuan',
                'for_who' => 'For Large Teams',
                'features' => [
                    'Feature 1 for Enterprise',
                    'Feature 2 for Enterprise',
                    'Feature 3 for Enterprise',
                    'Feature 4 for Enterprise',
                    'Feature 5 for Enterprise',
                ]
            ],
        ];

        foreach ($plans as $planData) {
            $plan = Plan::create([
                'name' => $planData['name'],
                'price' => $planData['price'],
                'description' => $planData['description'],
                'for_who' => $planData['for_who'],
            ]);

            foreach ($planData['features'] as $feature) {
                $plan->plan_features()->create(['feature' => $feature]);
            }
        }
    }
}