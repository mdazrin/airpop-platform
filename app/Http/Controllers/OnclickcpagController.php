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
        $advertFormat = (new Campaign)->advertFormat($request);
        $targeting = (new Campaign)->targetingFields($request);
        $optional = (new Campaign)->optionalFields($request);

        //multiformat
        $multiFormatAdvert = (new Campaign)->multiFormatAdvert($request);
        $multiFormatTargeting = (new Campaign)->multiFormatTargeting($request);
        $creativeFormat = (new Campaign)->creativeFormat($request);
        $multiFormatOptional = (new Campaign)->multiFormatOptional($request);

        $collection = collect([
            $core,
            $advertFormat,
            $targeting,
            $optional

        ]);

        $collapsed = $collection->collapse();

        $multiformatCollection = collect([
            $core,
            $multiFormatAdvert,
            $multiFormatTargeting,
            $multiFormatOptional,
            $creativeFormat,


        ]);

        $secondResponse = $multiformatCollection->collapse();



        $response = Http::withToken(Campaign::token)
            ->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
                $collapsed);

        if($request->boolean('onclick_multiformat'))
        {
            $response = Http::withToken(Campaign::token)
                ->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
                    $secondResponse);
        }


        //dd($newCollapsed);
        dd($response->json());
        //dd($request->input('onclick_multiformat'));
        return Inertia::render('Onclickcpag',[
            'success'=>$response->created()
        ]);
    }
}
