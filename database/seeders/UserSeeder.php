<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $check = User::where('phone','+998998955991')->first();
        if (empty($check)){
            $user = new User();
            $user->name = 'Mardon';
            $user->surname = 'Aslonov';
            $user->phone = '+998998955991';
            $user->password = bcrypt('2321341');
            $user->save();
        }
    }
}
