<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Admin login panel';
        return view('admin.auth.login', compact('title'));
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:30',
        ]);

        // Validation fail
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Database
            $credential = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credential)) {
                return redirect()->route('admin.dashboard')->with('success', 'Successfully lodged In');
            }
            return redirect()->route('admin.login')->with('danger', 'Sorry !!! You are not exits');

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', "Error" . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|max:30',
        ]);
        // Validation fail
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            // Database
            $count = DB::table('admins')->count();
            if ($count == 0) {
                $admin = new Admin();
                $admin->name = $request['name'];
                $admin->email = $request['email'];
                $admin->password = Hash::make($request['password']);
                $admin->is_super = 1;
                $admin->save();
            } else {
                $admin = new Admin();
                $admin->name = $request['name'];
                $admin->email = $request['email'];
                $admin->password = Hash::make($request['password']);
                $admin->save();
            }
            return redirect()->route('admin.login')->with('success', 'You are registered successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', "Error" . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
