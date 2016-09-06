<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Cinehall;
use App\Hall;
use App\Profile;
use App\Role;
use App\ShowTime;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('UserAppSeed');
        $this->command->info('Seed Created Successfully');
    }
}

class UserAppSeed extends Seeder{

    public function run() {
        DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('profiles')->delete();
        DB::table('showtime')->delete();
        DB::table('cinehall')->delete();
        DB::table('halls')->delete();


        $admin = Role::create(array('name'=>'ROLE_ADMIN'));
        $user = Role::create(array('name'=>'ROLE_USER'));
        $this->command->info('Role Seeded Successfully');

        $ram = User::create(array('name'=>'ram','email'=>'ram@gmail.com','password'=>bcrypt('password'),'role_id'=>$admin->id));
        $shyam = User::create(array('name'=>'shyam','email'=>'shyam@gmail.com','password'=>bcrypt('password'),'role_id'=>$user->id));
        $geeta = User::create(array('name'=>'geeta','email'=>'geeta@gmail.com','password'=>bcrypt('password'),'role_id'=>$user->id));
        $this->command->info('User Created Successfully');

        Profile::create(array('address'=>'thimi, bhaktapur','contact_no'=>'016578853','gender'=>'male','user_id'=>$ram->id));
        Profile::create(array('address'=>'jawlakhel, Lalitpur','contact_no'=>'01456345','gender'=>'male','user_id'=>$shyam->id));
        Profile::create(array('address'=>'Kalanki, Kathmandu','contact_no'=>'015675632','gender'=>'female','user_id'=>$geeta->id));
        $this->command->info('Profile Seeded Successfully');

        ShowTime::create(array('time'=>'8:30'));
        ShowTime::create(array('time'=>'13:30'));
        ShowTime::create(array('time'=>'18:30'));
        $this->command->info('Showtime Created Successfully');

        $gopi = Cinehall::create(array('name'=>'GopiKishan', 'address'=>'Chabahil', 'contact'=> '014455267'));
        $qfx = Cinehall::create(array('name'=>'QfxKumari', 'address'=>'Putalisadak', 'contact'=> '015455267'));
        $jaynepal = Cinehall::create(array('name'=>'Jaynepal', 'address'=>'Hattisar', 'contact'=> '015455567'));
        $this->command->info(' Cinehall created Successfully');

        Hall::create(array('name'=>'Gopi','cinehall_id'=> $gopi->id));
        Hall::create(array('name'=>'Krishna','cinehall_id'=> $gopi->id));
        Hall::create(array('name'=>'Radha','cinehall_id'=> $gopi->id));
        Hall::create(array('name'=>'QfxHall1','cinehall_id'=> $qfx->id));
        Hall::create(array('name'=>'QfxHall2','cinehall_id'=> $qfx->id));
        Hall::create(array('name'=>'QfxHall3','cinehall_id'=> $qfx->id));
        Hall::create(array('name'=>'Jay','cinehall_id'=> $jaynepal->id));
        Hall::create(array('name'=>'Nepal','cinehall_id'=> $jaynepal->id));
        $this->command->info('Hall Created Successfully');

    }

}


