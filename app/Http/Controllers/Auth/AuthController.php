<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function loginStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|min:4|max:100',
            'password' => 'required|min:6|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', 'Validation failed');
        }
        try {
            $user = DB::table('users')->where('mail', $request['email'])->first();
            if ($user) {
                if ($user->status == 1) {
                    if (Auth::attempt(['mail' => $request['email'], 'password' => $request['password']])) {
                        if (Auth::user()->roles === 'admin') {
                            return redirect()->route('admin.dashboard')->with('success', 'Successfully logged in');
                        } else if (Auth::user()->roles === 'administrator') {
                            return redirect()->route('administrator.dashboard')->with('success', 'Successfully logged in');
                        } else {
                            return redirect()->route('login.index')->with('danger', 'Logged in failed');
                        }
                    } else {
                        return redirect()->back()->with('danger', 'User and password do not match. Please provide valid credentials.');
                    }
                } else {
                    return redirect()->back()->with('danger', 'Sorry, your account is currently disabled. Contact support for assistance.');
                }
            } else {
                return redirect()->back()->with('danger', 'Sorry, your account does not exist.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function logout()
    {
        return 'logout';
    }
    public function destroy(string $id)
    {
        //
    }
}
