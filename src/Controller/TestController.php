<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TestController
{
    public function index(Request $requist, $age)
    {
        // dd($requist);
        //$requist = Request::createFromGlobals();
        //age = $requist->attributes->get('age', 0);
        return new Response("vous avez : $age ");
        dd("elhamdou lilah");
    }
    /**
     * 
     * @Route("/test/{age<\d+>?0}")
     * 
     */

    public function test()
    {

        dd('tese');
    }
}
