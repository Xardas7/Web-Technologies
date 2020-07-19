<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    function admin(){
        return view('admin.index');
    }

}
