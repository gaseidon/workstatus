<?php

namespace App\Http\Controllers\Freelance;
use Illuminate\Http\Request;
class FreelancerController extends BaseController
{
    public function index(){
        return view('freelancers.freelancers');
    }
}
