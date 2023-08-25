<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class TestController extends Controller
{
    public function create(Request $request): Response
    {

        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
            ->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
        [
            'name'=>$request->get('name'),
            'direction'=>$request->get('direction'),
            'rate_model'=>$request->get('rate_model'),
            'target_url'=>$request->get('target_url'),
            'status'=>1,
            'started_at'=>$request->get('started_at'),
            'expired_at'=>$request->get('expired_at'),
            'audience'=>$request->get('audience'),
            'targeting'=>$request->get('targeting'),
            'timezone'=>$request->get('timezone'),
            'rates'=>$request->get('rates'),



        ]);

        dd($response->json());
        return Inertia::render('Pushscpc',[
            'success'=>$response->created()
        ]);
    }
}
