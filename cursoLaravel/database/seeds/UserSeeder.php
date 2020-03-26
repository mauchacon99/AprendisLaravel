<?php
use App\Models\User;
use App\Models\Profession;
use App\Models\UserProfile;
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

        $professionId = Profession::where('title','Desarrollador Web')->value('id');
        
        $user = factory(user::class)->create([
            'email' =>'mauchacon99@gmail.com',
            'password' => bcrypt('12346789'),
            'role'   => 'admin',
            ]
        );

        $user->profile()->create([
            'bio' => 'Profesor, programador, periodista', 
            'profession_id' => $professionId
        ]);



        factory(User::class, 1000)->create()->each(function ($user) {
            $user->profile()->create(
                factory(\App\Models\UserProfile::class)->raw()
            );
        });
        
        
    }

}