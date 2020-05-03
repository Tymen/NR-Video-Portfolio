<?php

use Illuminate\Database\Seeder;
use \App\Services;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::truncate();
        Services::create(['name' => 'Trouwen']);
        Services::create(['name' => 'AfterParty']);
        Services::create(['name' => 'Anders']);
    }
}
