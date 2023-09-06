<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeLoginController extends Controller
{
    public function login()
    {
        return view('employees.login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $result = Auth::guard('employee')->attempt([
            'email' => $request->email,
            'password' => ($request->password),
        ], $request->boolean('remember'));

        if ($result) {
            return redirect()->route('leaves.index', Auth::guard('employee')->user());
        } else {
            return back()->withInput()->withErrors([
                'email' => 'Invalid credentials'
            ]);
        }
    }
}
