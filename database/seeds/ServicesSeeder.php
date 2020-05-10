<?php

use Illuminate\Database\Seeder;
use \App\Services;
use \App\Pages;
use \Spatie\Permission\Models\Role;
use \App\WebStats;
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
            'title' => 'After Movies',
            'name' => 'after-movie'
        ]);
        Services::create([
            'title' => 'Anders',
            'name' => 'anders'
        ]);
        Pages::truncate();
        Pages::create([
            'name' => 'home',
            'blade' => 'home',
            'title' => 'Home',
            'body' => '{"images":["\/home_1588893725.jpg","\/home_1588893746.jpg"],"body":["<p><strong>Titel<\/strong><br \/>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit justo tellus, molestie tristique arcu posuere a. Vivamus scelerisque cursus mi eu semper. Cras pretium ligula vitae finibus egestas. Praesent eu rhoncus mauris, sit amet venenatis massa. Cras gravida ante non feugiat consequat. Morbi faucibus ipsum vitae dignissim posuere. In dignissim egestas consequat.&nbsp;<\/p>","<p><strong>Titel<\/strong><br \/>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit justo tellus, molestie tristique arcu posuere a. Vivamus scelerisque cursus mi eu semper. Cras pretium ligula vitae finibus egestas. Praesent eu rhoncus mauris, sit amet venenatis massa. Cras gravida ante non feugiat consequat. Morbi faucibus ipsum vitae dignissim posuere. In dignissim egestas consequat.&nbsp;<\/p>"],"aboutMeImages":["\/home_1589024501.jpg",null],"aboutMeBody":["<p>sdadawdadawdwadaw<\/p>",null]}',
            'banner' => ''
        ]);
        Role::truncate();
        Role::create([
            "name" => 'admin',
        ]);
        WebStats::truncate();
        WebStats::create([
            "maintenance" => 0,
        ]);
    }
}
