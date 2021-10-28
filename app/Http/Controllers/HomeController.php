<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function reorder(Request $request)
    {
        $member = $request->member;
        
        $position = 1;
        foreach ($member as $member) {
            Team::findOrFail($member)->update([
                'position' => $position++,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        return 'Successfully re-ordered!';
    }
}
