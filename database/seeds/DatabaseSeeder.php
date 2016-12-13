<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        //$this->call('PostTableSeeder');

        // call our class and run our seeds
        
        $this->call('BearAppSeeder');
        $this->command->info('Bear app seeds finished.'); // show information in the command line after everything is run

        Model::reguard();
    }
}

