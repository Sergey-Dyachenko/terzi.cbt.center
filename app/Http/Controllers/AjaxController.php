<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function index(){
        $msg = "This is a simple message";
        return respnse()->json(array('msg' => $msg), 200 );
    }
}
