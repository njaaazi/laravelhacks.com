<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHackRequest;
use App\Models\Hack;

class SubmitHacksController
{
    public function __invoke(StoreHackRequest $request)
    {
        Hack::create([
            'title' => $request->title,
            'url' => $request->url,
            'text' => $request->text,
        ]);

        return redirect('/');
    }
}
