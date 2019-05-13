<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class Team extends Controller
{
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
