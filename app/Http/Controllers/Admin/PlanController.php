<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::withTrashed()->get();
        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        $plan = Plan::create($request->all());
        Session::flash('message', "New plan, {$plan->name} created.");
        return redirect()->route('admin.plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('admin.plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PlanRequest  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, Plan $plan)
    {
        $plan->update($request->all());
        Session::flash('message', "{$plan->name} updated.");
        return redirect()->route('admin.plan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        if ($plan->trashed()) {
            $plan->restore();
        } else {
            $plan->delete();
        }

        Session::flash('message', "{$plan->name} updated.");
        return redirect()->route('admin.plan.index');
    }
}
