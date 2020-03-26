<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use App\Models\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*DB::insert('insert into professions (title) values (:title)', [
           'title'=>'Desarrollador Back-end'
           ]
        );*/
        Profession::create([
            'title' => 'Desarrollador Web'
        ]);
        Profession::create([
            'title' => 'Desarrollador front-end'
        ]);
        Profession::create([
            'title' => 'Desarrollador back-end'
        ]);
        Profession::create([
            'title' => 'Diseñador Web'
        ]);
        Profession::create([
            'title' => 'Ing. Software'
        ]);
        factory(Profession::class, 17)->create();
     
     }

}
