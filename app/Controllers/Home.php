<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return $this->home();
    }

    public function home(){
        $data = array();
        helper('form');
        echo view('home/welcome',$data);
    }
}
