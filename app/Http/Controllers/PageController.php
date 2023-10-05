<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function show($id) {        // associative array
        return view('pages.show', [
            'id' => $id,
            'name' => 'Saac'///////////////////////////////
        ]);
    }

}
