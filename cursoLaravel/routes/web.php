<?php


Route::get('/', function () {
    return 'Laravel';
});


// Test
 
Route::get('saludo/{name}/{nickname?}', 'WelcomeUserController');

//User 

Route::get('/users', 'UserController@index')
	->name('users.index');

Route::get('users/{user}','UserController@show')
	->where('user', '[0-9]+')
	->name('users.show');

Route::get('users/create', 'UserController@create')
	->name('users.create');

Route::post('users/create','UserController@store');

Route::get('users/{user}/editar','UserController@edit')
	->name('users.edit');

Route::put('users/{user}','UserController@update');


 
Route::delete('users/{user}','UserController@destroy')
	->name('users.destroy');


// Professions

Route::get('professions/','ProfessionController@index')
	->name('professions.index');

Route::delete('professions/{profession}','ProfessionController@destroyStore')
	->name('professions.destroy');



// Skill
Route::get('skills/','SkillsController@index')
	->name('skills.index');