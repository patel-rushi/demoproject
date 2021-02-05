<?php

namespace App\Http\Controllers;

use App\Models\DB_Operations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;


class DBoperationsController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'status' => [''],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return DB_Operations::create([
    //         'email' => $data['email'],
    //         'status' => $data['status'], 
    //     ]);
    // }
    public function operations(Request $request){
        if(isset($_POST['insert'])){
            // validator($_POST('email'));
            // return DB_Operations::create([
            //     'email' => $data['email'],
            //     'status' => $data['status'], 
            // ]);
            $lv_email=$_POST["email"];
            $lv_status=$_POST["Status"];
            DB::insert('insert into d_b__operations (email, status) values (?, ?)', [$lv_email, $lv_status]);
            //print_r($_POST);
        }

        else if(isset($_POST['delete'])){
            $rules = [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'status' => ['']
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return redirect('operation')
                ->withInput()
                ->withErrors($validator);
            }
            else{
                $data = $request->input();
                try{
                    $student = new DB_Operations;
                    $student->email = $data['email'];
                    $student->status = $data['status'];
                    $student->save();
                    echo 'Inserted';
                }
                catch(Exception $e){
                    echo 'Failed';
                }
            
        }
    }
        else if(isset($_POST['fetchall'])){
            echo 'fetchall';
        }
    }
    
}
