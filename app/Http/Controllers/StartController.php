<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $url_data = [
            [
                'title'=>'Орлеу',
                'url'=>'http://orleupvl.kz'
                ],
            [
                'title'=>'Youtube',
                'url'=>'https://youtube.com'
            ]
        ];
        return view('welcome',[
            'url_data'=>$url_data
        ]);
    }

    public function getjson()
    {
        return [
            [
                'title'=>'Орлеу',
                'url'=>'http://orleupvl.kz'
            ],
            [
                'title'=>'Youtube',
                'url'=>'https://youtube.com'
            ]
        ];
    }
}
