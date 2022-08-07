<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * Método responsável por montar a view *home*
     * @return view com as informações da tela inicial.
     */
    public function index()
    {
        return view('header')
        . view('home');
    }
}
