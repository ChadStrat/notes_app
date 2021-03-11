<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::table('users')->insert([
            'name' => 'Mr Bean',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('notes')->insert(
            [
                'user_id' => 1,
                'title' => 'Test Note 1',
                'note' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ],
            [
                'user_id' => 1,
                'title' => 'Test Note 2',
                'note' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet. In massa tempor nec feugiat nisl pretium fusce id velit. Aenean euismod elementum nisi quis eleifend. Eleifend quam adipiscing vitae proin sagittis. Ac turpis egestas sed tempus urna et pharetra pharetra massa. Tristique risus nec feugiat in fermentum posuere urna. Id porta nibh venenatis cras sed. Enim neque volutpat ac tincidunt vitae. Cras semper auctor neque vitae tempus quam pellentesque nec. Ac turpis egestas integer eget. Lorem mollis aliquam ut porttitor leo a. Nibh tortor id aliquet lectus proin nibh nisl condimentum. Non pulvinar neque laoreet suspendisse interdum. Integer enim neque volutpat ac tincidunt vitae semper quis lectus. Lectus proin nibh nisl condimentum id venenatis a condimentum vitae. Potenti nullam ac tortor vitae purus faucibus. Blandit massa enim nec dui nunc mattis. Ut etiam sit amet nisl purus in mollis nunc.',
            ],
            [
                'user_id' => 1,
                'title' => 'Test Note 3',
                'note' => 'Placerat vestibulum lectus mauris ultrices eros in cursus turpis massa. Dui accumsan sit amet nulla facilisi. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Morbi tincidunt ornare massa eget egestas purus. Amet massa vitae tortor condimentum lacinia quis vel. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. Lacinia at quis risus sed vulputate. Suspendisse interdum consectetur libero id faucibus nisl tincidunt. Enim praesent elementum facilisis leo. Aliquet nec ullamcorper sit amet risus nullam. Leo a diam sollicitudin tempor id eu nisl nunc.',
            ],
        );
    }
}