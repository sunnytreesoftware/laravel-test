<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeNotification;
use App\User;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }

    public function employee(){

        $roles = Role::all();
        $employee = User::with('roles')->where('user_type', User::EMPLOYEE)->where('id','!=',Auth::user()->id)->paginate(10);

        // return $employee;
        return view('employee', ['roles' => $roles, 'employee' => $employee]);
    }

    public function addEmployee(Request $request){
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $role = $request->role;
        $start_date = $request->start_date;
        $password = $this->passwordGenerator();

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'start_date' => 'required|date',
            'role' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $employee = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'password' => Hash::make($password),
                'user_type' => User::EMPLOYEE,
                'start_date' => $start_date,
            ]);

            $employee->assignRole($role);
            Notification::send($employee,new WelcomeNotification($password,$email,"Hello $first_name $last_name"));
            DB::commit();
            return redirect()->back()->with('success', 'Employee has been successfully created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something is wrong please try again');
        }
    }

    private function passwordGenerator(){

        return Str::random(6);
    }
}
