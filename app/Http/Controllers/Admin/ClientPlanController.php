<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientPlan;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;

class ClientPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientPlans = ClientPlan::with(['user', 'plan'])->latest()->paginate(10);
        return view('admin.client-plans.index', compact('clientPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $plans = Plan::all();
        return view('admin.client-plans.create', compact('users', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:plans,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        ClientPlan::create($request->all());

        return redirect()->route('admin.client-plans.index')->with('success', 'Client Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientPlan $clientPlan)
    {
        return view('admin.client-plans.show', compact('clientPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientPlan $clientPlan)
    {
        $users = User::where('role', 'user')->get();
        $plans = Plan::all();
        return view('admin.client-plans.edit', compact('clientPlan', 'users', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientPlan $clientPlan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:plans,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $clientPlan->update($request->all());

        return redirect()->route('admin.client-plans.index')->with('success', 'Client Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientPlan $clientPlan)
    {
        $clientPlan->delete();
        return redirect()->route('admin.client-plans.index')->with('success', 'Client Plan deleted successfully.');
    }
}
