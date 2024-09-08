<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticateController extends Controller
{
    public function login() :View
    {
        return view('auth.login');
    }
    /*
    *Authenticate and redirecting to CRUD Features
    */
    public function check(LoginRequest $request): RedirectResponse
    {
        if(Auth::attempt(['email' =>$request ->email,'password' => $request ->password],$request->remember_me))
        {
            return to_route('employees.index');
        }
        return to_route('login')->with('warning', 'invalid login credentials');
    }
    /*
    *Register View
    */
    public function register(): View
    {
        return view('auth.register');
    }
    /*
    *Register User
    */
    public function store(RegisterRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return to_route('login')->with('success', 'Register Successfully');
    }
}
