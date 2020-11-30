<?php

namespace App\Http\Controllers;

use App\Models\Zadost;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index($group) {
        return view('request.index')->with('requests', Zadost::all()->where('do', $group));
    }
}
