<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AlbumController extends Controller
{
    
    public function Index():View
    {
        return view('album/index');
    }

    public function Create():View
    {
        return view('album/create');
    }

    public function Store(Request $request) {
        
    }

    public function Edit(int $id):View
    {
        return view('album/edit');
    }

    public function Update(int $id, Request $request) {

    }

    public function Delete(int $id) {
        
    }
}
