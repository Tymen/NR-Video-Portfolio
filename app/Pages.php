<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public function PagesMedia()
    {
        return $this->hasMany(PagesMedia::class, "pages_id", "id");
    }
}
