<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function Services(){
        $this->belongsTo(Services::class);
    }
}
