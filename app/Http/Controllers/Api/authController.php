<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\profile;
use Validator;
use Illuminate\Support\Facades\Auth; 
use App\location;
class authController extends Controller
{
    public function register_round_a(Request $request) 
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'phone' => 'required|unique:users', 
            'password' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']);

        $user =  User::create([
            'name' => $input['name'],
            'password' => $input['password'],
            'phone' => $input['phone'],
        ]);

        $success['token'] =  $user->createToken('auth')-> accessToken;

        return response()->json(['token'=>$success,'user' => $user], 200); 
    }

    public function register_round_b(Request $request)
    {
        $profile = profile::create([
            'user_id' => $request->user_id,
            'bloodtype' => $request->blood_type,
            'age' => $request->age,
            'weight' => $request->weight,
            'gender' => $request->gender
        ]);
    }

    public function register_round_c(Request $request) 
    {
        $location = location::create([
            'user_id' => $request->user_id,
            'latitude' => $request->coords['latitude'],
            'longitude' => $request->coords['longitude']
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['phone' => request('phone'), 'password' => request('password')]))
    	{
    		$user = Auth::User(); 
            $success['token'] =  $user->createToken('auth')-> accessToken;
            return response()->json(['success' => $success], 200); 
    	}else {
    		return response()->json(['error'=>'Unauthorised'], 401);
    	}
    } 
}
