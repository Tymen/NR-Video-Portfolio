<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function ServiceMedia()
    {
        return $this->hasMany(ServicesMedia::class, "service_id", "id");
    }
    public function Contact()
    {
        return $this->hasMany(Contact::class, "service_id", "id");
    }
}
