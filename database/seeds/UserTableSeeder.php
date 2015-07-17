<?php

    use Illuminate\Database\Seeder;
    use App\User;
    
    class UserTableSeeder extends Seeder {

        public function run()
        {
            DB::table('users')->delete();

            User::create(['name' => 'Saurav', 'email' => 'sourav@codez.in', 'password' => bcrypt('pass'), 'user_type' => '1']);
        }

    }