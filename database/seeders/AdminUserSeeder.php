<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
           'name' => 'Admin Perpus',
           'email' => 'admin@perpus.com',
           'password' => bcrypt(12345678),
           'email_verified_at' => now(),
       ]);

       $user->assignRole('admin');
    }
}
