<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function calculate_random(){
        echo 'redirecting...';
        sleep(2);
        return redirect('/hello');
    }
}
