<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class InterstitialcpmController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Interstitialcpm');
    }
    public function create(Request $request): Response
    {

        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
            [
                'name'=>$request->get('name'),
                'direction'=>'native',
                'rate_model'=>'cpm',
                'target_url'=>'https://propellerads.com/?zoneid=zoneId',
                'frequency'=>0,
                'capping'=>0,
                'status'=>1,
                'started_at'=>'26/5/2023',
                'expired_at'=>'27/5/2023',
                'is_adblock_buy'=>1,
                'evenly_limits_usage'=>false,
                'daily_amount'=>50,
                'total_amount'=>100,
                'targeting'=>[
                    'country'=>[
                        'list'=>[
                            'in',
                            'us',
                            'it'
                        ],
                        'is_excluded'=>false
                    ],
                    'time_table'=>[
                        'list'=>[
                            'Mon00'
                        ],
                        'is_excluded'=>false

                    ],
                    'connection'=>'mobile',
                    'os_type'=>[
                        'list'=>[
                            'mobile'
                        ],
                        'is_excluded'=>false
                    ],
                    'os'=>[
                        'list'=>[
                            'ios'
                        ],
                        'is_excluded'=>false
                    ],
                    'os_version'=>[
                        'list'=>[
                            'ios13'
                        ],
                        'is_excluded'=>false
                    ],
                    'zone_type'=>[
                        'list'=>[
                            38
                        ],
                        'is_excluded'=>false
                    ],
                    'traffic_categories'=>[
                        'propeller'
                    ]
                ],
                'timezone'=>3,
                'rates'=>[
                    [
                        'countries'=>[
                            'in'
                        ],
                        'amount'=>0.5
                    ],
                    [
                        'countries'=>[
                            'us',
                            'it'
                        ],
                        'amount'=>0.9
                    ]
                ],
                'creatives'=>[
                    [
                        'status'=>1,
                        'frequency'=>3,
                        'capping'=>86400,
                        'title'=>'Creative One',
                        'image'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAewAAAFIAQMAAACoaV/bAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAANQTFRF////p8QbyAAAACtJREFUeJztwYEAAAAAw6D5U1/gCFUBAAAAAAAAAAAAAAAAAAAAAAAAAHwDULgAAVNxxnoAAAAASUVORK5CYII=',

                    ]

                ]
            ]);


        //dd($response->json());
        return Inertia::render('Interstitialcpm',[
            'success'=>$response->created()
        ]);
    }
}
