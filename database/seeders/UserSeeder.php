<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = User::where('email', 'admin@example.com')->first();
        // if (!$admin) {
        //     $admin = new User();
        //     $admin->name = "Administrator S.";
        //     $admin->role = 'ADMIN';
        //     $admin->email = 'admin@example.com';
        //     $admin->password = Hash::make('adminpass');
        //     $admin->save();
        // }

        // $user = User::where('email', 'user01@example.com')->first();
        // if (!$user) {
        //     $user = new User();
        //     $user->name = "ยูสเซอร์ 01";
        //     $user->role = 'USER';
        //     $user->email = 'user01@example.com';
        //     $user->password = Hash::make('userpass');
        //     $user->save();
        // }

        // $editor = User::where('email', 'editor@example.com')->first();
        // if (!$editor) {
        //     $user = new User();
        //     $user->name = "Editar";
        //     $user->role = 'EDITOR';
        //     $user->email = 'editor@example.com';
        //     $user->password = Hash::make('editorpass');
        //     $user->save();
        // }

        // User::factory(10)->create();
    }
}
