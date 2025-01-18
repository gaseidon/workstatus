<?php

namespace App\Http\Controllers\Freelance;

use Illuminate\Http\Request;
class VacancyController extends BaseController
{
    public function index(){
        return view('vacancy.vacancy');
    }

}
