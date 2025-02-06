<?php

namespace App\Http\Controllers\Freelance;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function index()
    {

        return view('main.main');
    }
}
