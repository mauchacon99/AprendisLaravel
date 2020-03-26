<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->TrucanteTable([
            'professions',
            'skills',
            'users'
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call([
            ProfessionSeeder::class,
            UserSeeder::class,
            SkillSeeder::class,
        ]);
 

    }
    
    protected function TrucanteTable (array $tables)
    {
        foreach ($tables as $table) {
           DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
           DB::table($table)->truncate();
           DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        }
    }
}
