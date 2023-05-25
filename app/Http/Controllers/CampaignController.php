<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;


class CampaignController extends Controller
{
    public function index(): Response
    {
        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')->get('https://ssp-api.propellerads.com/v5/adv/campaigns',[
            'is_archived'=>0
        ]);

        return Inertia::render('Campaign', [
            'campaign' => $response->json()
        ]);
    }

}
