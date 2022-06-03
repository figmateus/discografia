<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackController extends Controller
{
    
    public function Create():View
    {
        return view('track/create');
    }

    public function Store(Request $request) {

        $data = $request->validated();
        $album = Track::create($data);

        return redirect('/discografia');
    }

    public function Edit(int $id):View
    {
        return view('track/edit');
    }

    public function Update(int $id, Request $request) {

    }

    public function Delete(int $id) {
        
    }
}
