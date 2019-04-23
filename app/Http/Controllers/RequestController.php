<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function requestCategory(Request $request) {
        $this->validate($request->except(),[

        ]);
    }
}
