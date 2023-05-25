<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index(): Response
    {
        //$response = Http::get('https://4f18089d-1ec3-4e9e-adb0-b0a474267fd3.mock.pstmn.io/adv/campaign');
        return Inertia::render('CreateCampaign');
    }

    public function create(Request $request): Response
    {
        //logic for target url
        //check the pricing model first
        $domain = (new Campaign)->domain($request);
        $arr = array($request->get('target_url'),$domain);
        $target = join($arr);

        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
        [
            'name'=>$request->get('name'),
            'direction'=>'nativeads',
            'rate_model'=>'cpag',
            'frequency'=>null,
            'capping'=>null,
            'target_url'=>$target,
            'status'=>1,
            'started_at'=>'25/5/2023',
            'expired_at'=>'26/5/2023',
            'is_adblock_buy'=>null,
            'evenly_limits_usage'=>null,
            'cpa_goal_bid'=>null,
            'cpa_goal_status'=>null,
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
            ]
        ]);


        dd($response->json());
        return Inertia::render('CreateCampaign',[
            'success'=>$response->created()
        ]);
    }
}
