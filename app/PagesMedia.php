<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesMedia extends Model
{
    public function Services(){
        $this->belongsTo(Pages::class);
    }
}
