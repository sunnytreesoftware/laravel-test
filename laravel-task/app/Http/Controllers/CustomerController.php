<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeNotification;
use App\User;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }

    public function customer(){

        $customers = User::where('user_type', 2)->paginate(10);
        return view('customer', ['customers' => $customers]);
    }

    public function addCustomer(Request $request){
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $password = $this->passwordGenerator();

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',

        ]);

        DB::beginTransaction();

        try {
            $employee = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'password' => Hash::make($password),
                'user_type' => 2,
            ]);

            $employee->assignRole(['customer']);
            Notification::send($employee,new WelcomeNotification($password,$email,"Hello $first_name $last_name"));
            DB::commit();
            return redirect()->back()->with('success', 'Customer has been successfully created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something is wrong please try again');
        }
    }

    private function passwordGenerator(){

        return Str::random(6);
    }
}
