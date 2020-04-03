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
            'user_profiles',
            'user_skill',
            'skills',
            'users',
            'teams'
            
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call([
            SkillSeeder::class,
            ProfessionSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,

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
