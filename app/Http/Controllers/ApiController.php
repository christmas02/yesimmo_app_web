<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\food;

class ApiController extends Controller
{
    //
    public function listMenu(){

        $listMenu = Food::get();
        return response()->json(['foods' => $listMenu]);
    }
}
