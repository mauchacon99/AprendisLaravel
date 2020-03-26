<?php

namespace App\http\ViewComponents;

use App\Models\{ User, UserProfile, Profession, Skill };

class UserFields
{
	public function __contrust(User $user)
	{
		$this->user = $user;
	}

	public function __ToString()
	{

	 	$skills      = Skill::OrderBy('name','ASC')->get();
        $professions = Profession::OrderBy('title','ASC')->get();
        $roles       = trans('users.roles');

		return view('users._fields',compact('professions','skills','roles'))
		->with('user', $this->user)
		->render();

	}
}