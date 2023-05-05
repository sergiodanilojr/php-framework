<?php

namespace App\Http\Controllers;

use Framework\Http\Response;

class HomeController
{
    public function index():Response
    {
        $content = "<h1>Simbora Dev!</h1>";

        return new Response($content);
    }
}