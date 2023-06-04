<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class OnclickcpmController extends Controller
{
    public function index(): Response
    {

        $propadsTimetable = (new Campaign)->propadsTimetable();
        $propadsOsVersion = (new Campaign)->propadsOsVersion();
        $propadsOsType = (new Campaign)->propadsOsType();
        $propadsOs = (new Campaign)->propadsOs();
        $propadsDeviceType = (new Campaign)->propadsDeviceType();
        $propadsDevice = (new Campaign)->propadsDevice();
        $propadsBrowser = (new Campaign)->propadsBrowser();
        $propadsZone = (new Campaign)->propadsZone();
        $propadsConnection = (new Campaign)->propadsConnection();
        $propadsMobileIsp = (new Campaign)->propadsMobileIsp();
        $propadsProxy = (new Campaign)->propadsProxy();
        $propadsLanguage = (new Campaign)->propadsLanguage();
        $propadsAudience = (new Campaign)->propadsAudience();
        $propadsTrafficCategories = (new Campaign)->propadsTrafficCategories();


        return Inertia::render('Onclickcpm',[
            'propads_timetable'=>$propadsTimetable,
            'propads_os_version'=>$propadsOsVersion,
            'propads_os_type'=>$propadsOsType,
            'propads_os'=>$propadsOs,
            'propads_device_type'=>$propadsDeviceType,
            'propads_device'=>$propadsDevice,
            'propads_browser'=>$propadsBrowser,
            'propads_zone'=>$propadsZone,
            'propads_connection'=>$propadsConnection,
            'propads_mobile_isp'=>$propadsMobileIsp,
            'propads_proxy'=>$propadsProxy,
            'propads_language'=>$propadsLanguage,
            'propads_audience'=>$propadsAudience,
            'propads_traffic_categories'=>$propadsTrafficCategories

        ]);
    }



    public function create(Request $request): Response
    {

        $response = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')->post('https://ssp-api.propellerads.com/v5/adv/campaigns',
            [
                'name'=>$request->input('name'),
                'direction'=>'onclick',
                'rate_model'=>'cpm',
                'target_url'=>'https://propellerads.com/?zoneid=zoneId',
                'frequency'=>3,
                'capping'=>86400,
                'status'=>1,
                'started_at'=>'2/6/2023',
                'expired_at'=>'3/6/2023',
                'is_adblock_buy'=>1,
                'targeting'=>[
                    'country'=>[
                        'list'=>$request->input('countries'),
                        'is_excluded'=>false
                    ],
                    'user_activity'=>[
                        'list'=>$request->input('user_activity'),
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
                            'in',

                        ],
                        'amount'=>0.5
                    ]
                ]
            ]);


        dd($response->json());
        //dd($request->input('countries'));
        //dd($wrap);
        return Inertia::render('Onclickcpm',[
            'success'=>$response->created()
        ]);
    }
}
