<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Admin',
               'email'=>'admin@colorit.com',
                'is_admin'=>'1',
               'password'=> bcrypt('C0l0r!t'),
            ]
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
    
}