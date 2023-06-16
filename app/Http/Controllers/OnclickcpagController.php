<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class OnclickcpagController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Onclickcpag');
    }
    public function create(Request $request): Response
    {
        $core = (new Campaign)->coreFields($request);
        $targeting = (new Campaign)->targetingFields($request);
        $optional = (new Campaign)->optionalFields($request);
        $collection = collect([
            $core,
            $targeting,
            $optional

        ]);
        $collapsed = $collection->collapse();

        $response = Http::withToken(Campaign::token)
            ->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
                $collapsed);


        //dd($collapsed);
        //dd($response->json());
        //dd($request->input('name','myname'));
        return Inertia::render('Onclickcpag',[
            'success'=>$response->created()
        ]);
    }
}
