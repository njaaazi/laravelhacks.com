<?php

namespace App\Http\Controllers;

use App\Models\Hack;
use Illuminate\Http\Request;

class SubmitHacksController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url'   => 'url',
            'text'  => 'required'
        ]);

        Hack::create([
            'title' => $request->title,
            'url'   => $request->url,
            'text'  => $request->text
        ]);

        return redirect('/');
    }
}
