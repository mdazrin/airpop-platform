<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class OnclickscpmController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Onclickscpm');
    }
    public function create(Request $request): Response
    {
        $core = (new Test)->coreFields($request);
        $targeting = (new Test)->targetingFields($request);
        $optional = (new Test)->optionalFields($request);
        $collection = collect([
            $core,
            $targeting,
            $optional

        ]);
        $collapsed = $collection->collapse();

        $response = Http::withToken(Test::token)
            ->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
                $collapsed);


        //dd($collapsed);
        dd($response->json());
        //dd($request->input('name','myname'));
        return Inertia::render('Onclickscpm',[
            'success'=>$response->created()
        ]);
    }
}
