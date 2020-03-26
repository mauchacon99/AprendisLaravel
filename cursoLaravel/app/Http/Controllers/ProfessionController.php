<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{ User, UserProfile, Profession, Skill};



class ProfessionController extends Controller
{
   	
   public function index()
   {

   		$professions = Profession::query()
		->withCount('profiles')
		->orderBy('title')
		->get();


   		return view('professions.index',[
   			'professions'  => $professions,
   		]) ;
   }

   public function destroyStore(Profession $profession)
   {	
   		//abort_if($profession->profileS()->exists(), 400, 'No se puede eliminar');

   		$profession->delete();

   		return redirect('professions');
   }
}
