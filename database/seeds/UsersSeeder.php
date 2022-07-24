<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = new Role;
        $adminRole->name="admin";
        $adminRole->display_name="Administrator";
        $adminRole->save();

        // Membuat role member
        $member1Role = new Role;
        $member1Role->name="member";
        $member1Role->display_name="member";
        $member1Role->save();

        

        // Membuat sample admin
        $admin = new User();
        $admin->name='admin';
        $admin->email='admin@gmail.com';
        $admin->password=bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat sample member
        $member1 = new User();
        $member1->name='member';
        $member1->email='jahid@gmail.com';
        $member1->password=bcrypt('rahasia');
        $member1->save();
        $member1->attachRole($member1Role);

         
    }
}
