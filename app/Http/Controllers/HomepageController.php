<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'completed' => Assessment::where('user_id', auth()->user()->id)->completed()->get(),
            'inProgress' => Assessment::where('user_id', auth()->user()->id)->inProgress()->get()
        ]);
    }
}
