<?php

use Illuminate\Database\Seeder;
Use App\Models\Team;
class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class)->create([ 'name' => 'styden']);
        factory(Team::class)->times(99)->create();

    }
}
