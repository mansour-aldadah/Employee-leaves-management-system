<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::where('employee_id', Auth::guard('employee')->id())->orderBy('status', 'DESC')->get();
        $success = session('success');
        return view('leaves.index', [
            'leaves' => $leaves,
            'success' => $success
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'employee_id' => Auth::guard('employee')->id(),
            'user_id' => Auth::guard('employee')->user()->user_id,
        ]);
        $leave = Leave::create($request->all());
        return redirect()->route('leaves.index')
            ->with('success', 'Leave Offer sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        return view('leaves.show', [
            'leave' => $leave
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        return view('leaves.edit', ['leave' => $leave]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        $request->merge([
            'employee_id' => Auth::guard('employee')->id(),
            'user_id' => Auth::guard('employee')->user()->user_id,
        ]);
        $leave->update($request->all());
        return redirect()->route('leaves.index')
            ->with('success', 'Leave Offer update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect(route('leaves.index'))
            ->with('success', 'Leave deleted');
    }
}
