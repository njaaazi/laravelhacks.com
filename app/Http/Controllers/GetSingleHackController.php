<?php

namespace App\Http\Controllers;

use App\Models\Hack;
use Illuminate\Http\Request;

class GetSingleHackController
{
    public function __invoke(Hack $hack)
    {
        return view('hacks.show', compact('hack'));
    }
}
