<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = DB::table('companies')
        ->select(array('id', 'name'))
        ->get();
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees','companies'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'email|unique:employees',
            'phone'=>'regex:/^(01)[0-9]{9}$/',
            'comp_id' => 'required'
        ]);
        //dd($request);
        Employee::create($request->all());
        return redirect()->route('employees.index')
            ->with('success', 'Employee assigned successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = DB::table('companies')
        ->select(array('id', 'name'))
        ->get();
        $employee = Employee::find($id);
        return view('employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'email|unique:employees,email,'.$id.',id',
            'phone'=>'nullable|regex:/^(01)[0-9]{9}$/',
            'comp_id' => 'required'
        ]);
        $Employee = Employee::find($id);
        $Employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Emloyee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
