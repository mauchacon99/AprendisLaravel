<?php

namespace App\Http\Controllers;

use App\Models\{ User, UserProfile, Profession, Skill};
use App\Http\Requests\{ CreateUserRequest, UpdateUserRequest };

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index($value='')
    {
    	return view('skills.index',[

    		'skills' => Skill::OrderBy('name')->get(),
    	]);
    }
}
