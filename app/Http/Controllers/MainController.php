<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $page_title = 'Home';
        
        $action = __FUNCTION__;
    
        return view('/index', compact('page_title','action'));
     
    }

    public function docs()
    {
        $page_title = 'Dokumentasi Page';
        
        $action = __FUNCTION__;
    
        return view('/docs-nologin', compact('page_title','action'));
    }
}
