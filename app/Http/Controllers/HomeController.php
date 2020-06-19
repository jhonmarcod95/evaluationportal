<?php

namespace App\Http\Controllers;
use App\Employee;
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
        return view('home');
    }
    public function home()
    {
        return view('home',array(

            'subheader' => 'Dashboard',
            'header' => 'Home',
            
        ));

    }
    public function profile ()
    {
        $employee = Employee::with('EmployeeCompany','EmployeeLocation','EmployeeDepartment','EmployeeUser')->where('user_id',auth()->user()->id)->first();
        return view('profile',array(

            'subheader' => 'Profile',
            'header' => 'Home',
            'employee' => $employee,
            
        ));
    }
}
