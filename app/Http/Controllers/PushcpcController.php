<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class PushcpcController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Pushcpc');
    }
    public function create(Request $request): Response
    {

        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
            [
                'name'=>$request->get('name'),
                'direction'=>'nativeads',
                'rate_model'=>'cpc',
                'target_url'=>'https://propellerads.com/?zoneid=zoneId',
                'status'=>1,
                'started_at'=>'26/5/2023',
                'expired_at'=>'27/5/2023',
                'cpa_goal_bid'=>0.27,
                'cpa_goal_status'=>true,
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
                    'user_activity'=>[
                        'list'=>[
                            1,
                            2,
                            3
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
                            42,
                            78
                        ],
                        'is_excluded'=>true
                    ],
                    'traffic_categories'=>[
                        'premium'
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
                        'click_frequency'=>1,
                        'click_capping'=>86400,
                        'title'=>'Creative One',
                        'description'=>'This is the first creative',
                        'icon'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMAAAADAAQMAAABoEv5EAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAANQTFRF////p8QbyAAAABxJREFUeJztwTEBAAAAwqD1T20ND6AAAAAA4NcAEsAAAdLBrL4AAAAASUVORK5CYII=',
                        'image'=>'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAWgAAADwAQMAAAAXaWwMAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAANQTFRF////p8QbyAAAACFJREFUeJztwQENAAAAwqD3T20PBxQAAAAAAAAAAAAA/BgrIAAB/BxM7QAAAABJRU5ErkJggg==',
                        'default_button_disabled'=>false,
                        'buttons'=>[
                            [
                                'name'=>'Custom Text'
                            ]

                        ]
                    ]

                ]
            ]);


        //dd($response->json());
        return Inertia::render('Pushcpc',[
            'success'=>$response->created()
        ]);
    }
}
