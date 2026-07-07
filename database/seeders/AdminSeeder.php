<?php

namespace Database\Seeders;

 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\Hash;
 use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
  {
     
     Admin::create([
         'name'=>'Dr Bawar',
         'username'=>'admin',
         'email'=>'admin@hostel.com',
         'password'=>Hash::make('123456'),
         'role'=>'superadmin'
     ]);

   }

}
