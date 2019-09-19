<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert([
            'firstname' => 'Piyakarn',
            'lastname' => 'Nimmakulvirut',
            'phone' => '0658528414',
            'email' => 'jirakarnjim1@gmail.com',
            'password' => Hash::make('jirakarn12'),
            'tier' => '1',
            'activate' => true,
            'admin' => true,
            'ban' => false,
        ]);
    }
}
