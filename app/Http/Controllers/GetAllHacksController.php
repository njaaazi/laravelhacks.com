<?php

namespace App\Http\Controllers;

use App\Models\Hack;

class GetAllHacksController
{
    public function __invoke()
    {
        $hacks = Hack::with('user')->get();

        return view('hacks.index', compact('hacks'));
    }
}
