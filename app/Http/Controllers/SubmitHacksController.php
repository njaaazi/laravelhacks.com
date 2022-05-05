<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHackRequest;

class SubmitHacksController
{
    public function __invoke(StoreHackRequest $request)
    {
        auth()->user()->hacks()->create([
            'title' => $request->title,
            'url' => $request->url,
            'text' => $request->text,
        ]);

        return redirect('/');
    }
}
