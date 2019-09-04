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
        return json_encode(Bilets::orderBy('id', 'desc')->get());
    }

    public function addBilet(Request $request)
    {

        $bilet = new Bilets();
        $bilet->title = $request->title;
        $bilet->discription = $request->discription;
        $bilet->text = $request->text;
        $bilet->save();
        return response()->json([$request->all()]);
    }

    public function remove(Request $request){
        $remove = Bilets::find($request->id);
        $remove->delete();

        return response()->json([$request->all()]);
    }
    public function dataChart()
    {
        return [
            'labels' =>['март','апрель','май','июнь','июль'],
            'datasets' =>array([
                'label'=> 'Продажи',
                'backgroundColor' => '#F26202',
                'data' => ['15000','5000','10000','30000','3000'],
            ],
            [
                'label'=> 'Продажи',
                'backgroundColor' => 'red',
                'data' => ['10000','8000','40000','1000','2000'],
            ])
        ];
    }

    public function random()
    {
        return [
            'labels' =>['март','апрель','май','июнь','июль'],
            'datasets' =>array([
                'label'=> 'Золото',
                'backgroundColor' => '#F26202',
                'data' => [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
            ],
                [
                    'label'=> 'Серебро',
                    'backgroundColor' => '#58cc18',
                    'data' => [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
                ],
                [
                    'label'=> 'Лом',
                    'backgroundColor' => '#16AB39',
                    'data' => [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
                ])
        ];
    }
}
