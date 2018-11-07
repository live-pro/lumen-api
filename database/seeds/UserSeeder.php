<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $users = [
            [
                'first_name' => 'Kamal',
                'last_name' => 'Uddin',
                'mobile_no' => '023827487384',
                'email' => 'kamal@xyz.com'
            ], [
                'first_name' => 'Jamal',
                'last_name' => 'Uddin',
                'mobile_no' => '02983743434',
                'email' => 'jamal@xyz.com'
            ], [
                'first_name' => 'Mohin',
                'last_name' => 'Uddin',
                'mobile_no' => '029382474',
                'email' => 'mohin@xyz.com'
            ]
        ];
        foreach ($users as $value) {
            $user = new \App\User();
            $user->first_name = $value['first_name'];
            $user->last_name = $value['last_name'];
            $user->mobile_no = $value['mobile_no'];
            $user->email = $value['email'];
            $user->password = app('hash')->make('secret');
            $user->save();
        }
    }
}
