<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('user_id', Auth::id())->orderBy('status', 'DESC')->get();
        $success = session('success');
        return view('employees.offers', [
            'leaves' => $leaves,
            'success' => $success
        ]);
    }

    public function accept(Request $request, Leave $leave)
    {
        $request->merge([
            'employee_id' => $leave->employee_id,
            'user_id' => $leave->user_id,
            'status' => 'Accepted',
        ]);
        $leave->update($request->all());
        return redirect()->route('offers.index')
            ->with('success', 'Leave Offer accepted');
    }
    public function reject(Request $request, Leave $leave)
    {
        $request->merge([
            'employee_id' => $leave->employee_id,
            'user_id' => $leave->user_id,
            'status' => 'Rejected',
            'reason' => $request->reason
        ]);
        $leave->update($request->all());
        return redirect()->route('offers.index')
            ->with('success', 'Leave Offer rejected');
    }

    public function wait(Request $request, Leave $leave)
    {
        $request->merge([
            'employee_id' => $leave->employee_id,
            'user_id' => $leave->user_id,
            'status' => 'Waiting',
        ]);
        $leave->update($request->all());
        return redirect()->route('offers.index')
            ->with('success', 'Leave Offer is still waiting');
    }

    public function show(Leave $leave)
    {
        return view('leaves.show', [
            'leave' => $leave
        ]);
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('offers.index')
            ->with('success', 'Leave deleted');
    }
}
