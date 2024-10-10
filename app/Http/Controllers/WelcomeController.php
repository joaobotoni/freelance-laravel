<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('welcome');
    }

}
