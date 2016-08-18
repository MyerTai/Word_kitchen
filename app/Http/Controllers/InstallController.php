<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Word;
use App\Http\Controllers\Controller;

class InstallController extends Controller
{
    /*
     * 初始化系统
     *
     *
     */
    //
    public function run() 
    {
        $all = Word::all();
        
        
        return var_dump($all);
    }
}
