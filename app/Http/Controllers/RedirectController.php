<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(){
        echo 'redirecting...';
        sleep(2);
        return redirect('/hello');
    }
}
