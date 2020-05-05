<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function ServiceMedia()
    {
        return $this->hasMany(ServicesMedia::class, "service_id", "id");
    }
}
