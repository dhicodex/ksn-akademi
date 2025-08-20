<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planFeatures = \App\Models\PlanFeature::with('plan')->paginate(10);
        return view('admin.plan-features.index', compact('planFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = \App\Models\Plan::all();
        return view('admin.plan-features.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'plan_id' => 'required|exists:plans,id',
        ]);

        \App\Models\PlanFeature::create($request->all());

        return redirect()->route('admin.plan-features.index')->with('success', 'Plan feature created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $planFeature = \App\Models\PlanFeature::findOrFail($id);
        $plans = \App\Models\Plan::all();
        return view('admin.plan-features.edit', compact('planFeature', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'plan_id' => 'required|exists:plans,id',
        ]);

        $planFeature = \App\Models\PlanFeature::findOrFail($id);
        $planFeature->update($request->all());

        return redirect()->route('admin.plan-features.index')->with('success', 'Plan feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $planFeature = \App\Models\PlanFeature::findOrFail($id);
        $planFeature->delete();

        return redirect()->route('admin.plan-features.index')->with('success', 'Plan feature deleted successfully.');
    }
}
