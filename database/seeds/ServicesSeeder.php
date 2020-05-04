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
        Services::create([
            'title' => 'Trouwen',
            'name' => 'trouwen'
        ]);
        Services::create([
            'title' => 'AfterParty',
            'name' => 'after-party'
        ]);
        Services::create([
            'title' => 'Anders',
            'name' => 'anders'
        ]);
    }
}
