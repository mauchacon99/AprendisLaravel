<?php
use App\Models\User;
use App\Models\Profession;
use App\Models\UserProfile;
use App\Models\Skill;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$professions= DB::table('professions')->select('id')->take(1)->get();
       // dd($professions->first()->id);
        //$professions = DB::select('select id from professions LIMIT 0,1');
        
        //$profession = DB::table('professions')->select('id','title')->where('title','=','Desarrollador Web')->first();
        //$profession = DB::table('professions')->where(['title'=>'Desarrollador Web'])->first();
        /*$professionId = DB::table('professions')
            ->where('title','Desarrollador Web')
            ->value('id');
        

        DB::table('users')->insert([
            'name' => 'Mauricio',
            'email' =>'mauchacon99@gmail.com',
            'password' => bcrypt('12346789'),
            'profession_id' => $professionId
        ]);*/

        $this->fetchRelations();

        $this->createUserAdmin();

        foreach (range(0,995) as   $value) {

            $this->createUserRandom();
        }

    }

    public function fetchRelations()
    {
        $this->professions = Profession::all();
        $this->skills      = Skill::all();
        $this->teams       = Team::all();
    }

    public function createUserAdmin()
    {
        $admin = factory(user::class)->create([
            'team_id'  => $this->teams->firstWhere('name','styden')->id,
            'name'     => 'Mauricio Chacon',
            'email'    =>'mauchacon99@gmail.com',
            'password' => bcrypt('12346789'),
            'role'     => 'admin',
            'active'   => true,
            ]
        );

        $admin->Skills()->attach($this->skills);

        $admin->profile()->create([
            'bio'           => 'Profesor, programador, periodista', 
            'profession_id' => $this->professions->firstWhere('title', 'Desarrollador back-end')->id,
        ]);
    }

    public function createUserRandom()
    {
        $user = factory(User::class)->create([
            'team_id'  => rand(0,2) ? $this->teams->random()->id : null ,
            'active'   => rand(0,3) ? true : false ,
        ]);

        $user->Skills()->attach($this->skills->random(rand(0,7)));

        factory(UserProfile::class)->create([
           'user_id'        => $user->id,
           'profession_id'  => rand(0,2) ? $this->professions->random()->id : null ,
        ]);

    }

}