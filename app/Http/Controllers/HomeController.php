<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::count();
        $companies = Company::count();
        return view('home', compact('employees','companies'));
    }
}
