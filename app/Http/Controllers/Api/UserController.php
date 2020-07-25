<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	//
	public function index(Request $request)
	{
		$profile = $request->query('profile');

		if($profile === 'student'){
			$userStudents =  User::where(['profile' => 'student'])->get();
			return $userStudents;
		}
		
		if($profile === 'teacher'){
			$userTeacher =  User::where(['profile' => 'teacher'])->get();
			return $userTeacher;
		}

		// return $profile;
		
		return User::all();


	}

	public function store(Request $request)
	{

		$emailExist = User::where('email', $request->email)->first();

		if($emailExist){
			return response()->json(['error'=>'Email is already registered'], 409);
		}

	
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->date_birth = $request->date_birth;
		$user->profile = $request->profile;

		$user->save();

		return $user;

	}

	public function show(User $user)
	{
		return $user;
	}

	public function update(Request $request, User $user)
	{

		if (!empty($request->password)) {
			$user->password = $request->password;
		}

		$user->name = $request->name;
		$user->email = $request->email;
		$user->date_birth = $request->date_birth;
		$user->profile = $request->profile;

		$user->save();

		return $user;
	}
}
