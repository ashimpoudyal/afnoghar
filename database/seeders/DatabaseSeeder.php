<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use App\Models\Theme;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
           'fname' => "Roopesh",
           'lname' => "Ghimire",
           'email' => "roopacefrinz4@gmail.com",
           'address' => "Lokanthali Bhaktapur",
           'password' => bcrypt("password"),
           'phone' => "9810000000",
           'city'=>"Bhaktapur",
           'zip'=>"44811",
           'country'=>"Nepal",
           'facebook'=>"roopeshghimire",
           'instagram'=>"roopeshghimire",
           'linkedin'=>"roopeshghimire",
           'twitter'=>"roopeshghimire",
           'about'=>"Mero About Page Ho",
           'role_id' => 1,
           'status' => 1,
           'created_at' => now(),
           'updated_at' => now(),
       ]);


        Admin::insert([
           'fname' => "User",
           'lname' => "Ghimire",
           'email' => "user@gmail.com",
           'address' => "Lokanthali Bhaktapur",
           'password' => bcrypt("password"),
           'phone' => "9810000000",
           'city'=>"Bhaktapur",
           'zip'=>"44811",
           'country'=>"Nepal",
           'facebook'=>"roopeshghimire",
           'instagram'=>"roopeshghimire",
           'linkedin'=>"roopeshghimire",
           'twitter'=>"roopeshghimire",
           'about'=>"Mero About Page Ho",
           'role_id' => 0,
           'status' => 1,
           'created_at' => now(),
           'updated_at' => now(),
       ]);

       Admin::insert([
        'fname' => "User",
        'lname' => "Poudyal",
        'email' => "admin@gmail.com",
        'address' => "Lokanthali Bhaktapur",
        'password' => bcrypt("password"),
        'phone' => "9810000000",
        'city'=>"Bhaktapur",
        'zip'=>"44811",
        'country'=>"Nepal",
        'facebook'=>"roopeshghimire",
        'instagram'=>"roopeshghimire",
        'linkedin'=>"roopeshghimire",
        'twitter'=>"roopeshghimire",
        'about'=>"Mero About Page Ho",
        'role_id' => 0,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ]);


         Theme::insert([
            'site_title' => "Roopesh Website",
            'site_subtitle' => "THis is subtitle",
            'about' => "THis is About Section",
            'phone' => "THis is About Phone number",
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        User::insert([
            'name' => "User Login",
            'email' => "user@gmail.com",
            'password' => bcrypt("password"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);








    }
}
