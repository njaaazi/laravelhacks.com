<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hack extends Model
{
    use HasFactory;
    public $guarded = [];

    public function path()
    {
        return "hacks/$this->id";
    }
}
