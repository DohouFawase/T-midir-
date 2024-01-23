<?php

namespace App\Http\Controllers\Temidire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemidireController extends Controller
{
    //

    public function index(){

        return Inertia::render('Temidire/Contact');
    }
}
