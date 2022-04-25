<?php

namespace App\Http\Controllers;

class CreateHacksController
{
    public function __invoke()
    {
        return view('hacks.create');
    }
}
