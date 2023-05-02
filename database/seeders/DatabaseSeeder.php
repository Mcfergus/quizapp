<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = new User();
        $admin->name="admin";
        $admin->email="admin123@gmail.com";
        $admin->password= bcrypt('password');
        $admin->visible_password= "password";
        $admin->email_verified_at= NOW();
        $admin->occupation= "CEO";
        $admin->address= "Cameroon";
        $admin->phone= "654942097";
        $admin->is_admin=1;
        $admin->save();

        $admin = new User();
        $admin->name="admin1";
        $admin->email="admin12@gmail.com";
        $admin->password= bcrypt('admin123');
        $admin->visible_password= "admin123";
        $admin->email_verified_at= NOW();
        $admin->occupation= "CEO";
        $admin->address= "Cameroon";
        $admin->phone= "654942097";
        $admin->is_admin=0;
        $admin->save();
    }
}
