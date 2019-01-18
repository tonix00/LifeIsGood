<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	"name"=>"Antonio Comique",
        	"email"=>"tonmyx@yahoo.com",
        	"password"=> Hash::make("password"),
        	"is_admin"=> 1,
        	"remember_token" => str_random(10)
        ]);
    }
}
