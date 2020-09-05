<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('** Started seeding for admins **');

        
        Admin::create([
            'first_name'      => 'Super',
            'last_name'       => 'Admin',
            'email'           => 'admin@gmail.com',
            'password'        => bcrypt('admin123'),
        ]);

        $this->command->info('** Completed seeding for admins **');
    }
}
