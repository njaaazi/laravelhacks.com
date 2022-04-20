<?php

namespace App\Http\Controllers;

use App\Models\Hack;
use Illuminate\Http\Request;

class GetAllHacksController
{
    public function __invoke()
    {
        $hacks = Hack::all();

        return view('hacks.index', compact('hacks'));
    }
}
