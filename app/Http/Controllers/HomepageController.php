<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'completed' => Assessment::where('user_id', auth()->user()->id)->completed()->get(),
            'inProgress' => Assessment::where('user_id', auth()->user()->id)->inProgress()->get()
        ]);
    }
}
