<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Models\Admin::create([
            'name' => 'AbedElRahman',
            'email' => 'abed@gmail.com',
            'password'=> bcrypt('123456'),
            'username'=> 'Abed',
            'image'=> 'profile.png',
            'address'=> 'Palestine , Gaza',
            'facebook'=> 'https://www.facebook.com/lkhoya.l3aziz5',
            'twitter'=> 'https://twitter.com/AbedElR74857478',
            'Age'=> 22,
            'description'=> 'My job is mostly lorem ipsuming and dolor sit ameting as long as consectetur adipiscing elit.
                Sometimes quisque commodo massa gets in the way and sed ipsum porttitor facilisis.
                The best thing about my job is that vestibulum id ligula porta felis euismod and nullam quis risus eget urna mollis ornare.
                Thanks for visiting my profile.',

        ]);
    }
}
