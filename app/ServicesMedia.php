<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesMedia extends Model
{
    public function Services(){
        $this->belongsTo(Services::class);
    }
}
