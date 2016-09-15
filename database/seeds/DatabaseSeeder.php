<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cinehall;
use App\Models\Hall;
use App\Models\Profile;
use App\Models\Role;
use App\Models\ShowTime;
use App\Models\User;

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

class UserAppSeed extends Seeder
{
    public function run() {
        DB::table('roles')->delete();
        DB::table('users')->delete();
        DB::table('profiles')->delete();
        DB::table('showtime')->delete();
        DB::table('cinehall')->delete();
        DB::table('halls')->delete();

        $roleAdmin = Role::create(array('name'=>'ROLE_ADMIN'));
        $roleUser = Role::create(array('name'=>'ROLE_USER'));
        $this->command->info('Role Seeded Successfully');

        $admin = User::create(array('name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('admin'),'role_id'=>$roleAdmin->id));
        $user = User::create(array('name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('user'),'role_id'=>$roleUser->id));
        $this->command->info('User Created Successfully');

        Profile::create(array('address'=>'thamel','contact_no'=>'014457853','gender'=>'male','user_id'=>$admin->id));
        Profile::create(array('address'=>'naxal','contact_no'=>'014456345','gender'=>'male','user_id'=>$user->id));
        $this->command->info('Profile Seeded Successfully');

        ShowTime::create(array('time'=>'8:30'));
        ShowTime::create(array('time'=>'13:30'));
        ShowTime::create(array('time'=>'18:30'));
        $this->command->info('Showtime Created Successfully');

        $gopi = Cinehall::create(array('name'=>'GopiKishan', 'address'=>'Chabahil', 'contact'=>'014455317'));
        $qfx = Cinehall::create(array('name'=>'QfxKumari', 'address'=>'Putalisadak', 'contact'=>'015455267'));
        $jay = Cinehall::create(array('name'=>'JayNepal', 'address'=>'Hattisar', 'contact'=>'015458667'));
        $this->command->info(' Cinehall Created Successfully');

        Hall::create(array('name'=>'Gopi','cinehall_id'=> $gopi->id));
        Hall::create(array('name'=>'Krishna','cinehall_id'=> $gopi->id));
        Hall::create(array('name'=>'Radha','cinehall_id'=> $gopi->id));
        Hall::create(array('name'=>'QfxHall1','cinehall_id'=> $qfx->id));
        Hall::create(array('name'=>'QfxHall2','cinehall_id'=> $qfx->id));
        Hall::create(array('name'=>'QfxHall3','cinehall_id'=> $qfx->id));
        Hall::create(array('name'=>'Jay','cinehall_id'=> $jay->id));
        Hall::create(array('name'=>'Nepal','cinehall_id'=> $jay->id));
        $this->command->info('Hall Created Successfully');
    }
}
