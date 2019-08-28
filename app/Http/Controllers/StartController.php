<?php

namespace App\Http\Controllers;

use App\User;
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
            ],
            [
                'title'=>'mail',
                'url'=>'https://mail.ru'
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
                'name'=>'Орлеу',
                'url'=>'http://orleupvl.kz'
            ],
            [
                'name'=>'Youtube',
                'url'=>'https://youtube.com'
            ],
            [
                'name'=>'mail',
                'url'=>'https://mail.ru'
            ]
        ];
//        return User::all();
    }
}
