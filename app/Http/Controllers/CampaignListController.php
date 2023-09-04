<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;


class CampaignListController extends Controller
{
    public function index(): Response
    {
        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
            ->get('https://ssp-api.propellerads.com/v5/adv/campaigns',[
            'is_archived'=>0
        ]);

        $collection = $response->collect('result')->keyBy('id')->keys()->all();





        $statistics = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
            ->post('https://ssp-api.propellerads.com/v5/adv/statistics',[
                'group_by' => [
                    'campaign_id'

                ],
                'day_from' => "2022-05-28 00:00:00",
                'day_to' => "2024-06-02 23:59:59",
                'campaign_id'=>[
                    7006194,
                    7007572,

                ]

            ]);

        //dd($statistics->json());
        //dd($collection);
        //dd($response->json());

        return Inertia::render('Campaign', [
            'campaign' => $response->json(),
            'statistics' => $statistics->json()
        ]);
    }

}
