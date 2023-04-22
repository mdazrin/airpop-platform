<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class CampaignController extends Controller
{
    public function index(): Response
    {
        $response = Http::get('https://4f18089d-1ec3-4e9e-adb0-b0a474267fd3.mock.pstmn.io/adv/campaign');
        return Inertia::render('Campaign', [
            'user' => $response->json()
        ]);
    }

    public function index1(): Response
    {
        $response = Http::get('https://4f18089d-1ec3-4e9e-adb0-b0a474267fd3.mock.pstmn.io/adv/campaign');
        return Inertia::render('CreateCampaign', [
            'user1' => $response->json()
        ]);
    }
}
