<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(App\User::class, 30)->create();
        
        $adminUser = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'birthday' => $faker->dateTime($max = '-10 years', $timezone = null),
            'description' => $faker->paragraph,
            'url_picture' => 'https://place-hold.it/300',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $adminUser->assignRole('admin');

        $moderatorUser = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'moderator@moderator.com',
            'email_verified_at' => now(),
            'birthday' => $faker->dateTime($max = '-10 years', $timezone = null),
            'description' => $faker->paragraph,
            'url_picture' => 'https://place-hold.it/300',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $moderatorUser->assignRole('moderator');
    }
}
