<?php

namespace App\Http\Controllers;

use App\Bilets;
use App\User;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $url_data = [
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
        return view('welcome',[
            'url_data'=>$url_data
        ]);
    }

    public function getjson()
    {
        return json_encode(User::all());
    }

    public function getAjaxBilets()
    {
        return json_encode(Bilets::all());
    }
}
