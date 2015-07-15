<?php

    use Illuminate\Database\Seeder;
    use App\User;
    
    class UserTableSeeder extends Seeder {

        public function run()
        {
            DB::table('users')->delete();

            User::create(['name' => 'amit', 'email' => 'amit@gmail.com', 'password' => Hash::make('pass'), 'user_type' => '1']);
        }

    }