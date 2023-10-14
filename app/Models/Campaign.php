<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Campaign extends Model
{
    use HasFactory;

    const token = 'b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a';

    //get timetable api
    public function campaignSchedule()
    {
        return Http::withToken(self::token)
            ->get('https://ssp-api.propellerads.com/v5/collections/targeting/time_table');
    }

    public function coreFields(Request $request): array
    {
        $arr['name'] = $request->input('name');

        if($request->input('rate_model')=='scpa'||$request->input('rate_model')=='cpag')
        {
            $tempArr = array($request->input('target_url'),'/?clickid=${SUBID}');

        }else
        {
            $tempArr = array($request->input('target_url'),'/?zoneid=zoneId');
        }
        $targetUrl = implode($tempArr);
        $arr['target_url'] = $targetUrl;

        $arr['status'] = 1;
        $arr['started_at'] = '30/7/2023';
        $arr['expired_at'] = '9/10/2023';
        $arr['timezone'] = $request->input('timezone');
        $arr['rates'] =  $request->input('countriesRate');
        return $arr;
    }


    public function advertFormat(Request $request): array
    {
        $arr['direction'] = $request->input('direction');
        $arr['rate_model'] = $request->input('rate_model');

        return $arr;
    }

    //interstitial multiformat
    public function multiFormatAdvert():array
    {
        $arr['direction'] = 'native';
        $arr['rate_model'] = 'cpag';

        return $arr;
    }

    public function targetingFields(Request $request): array
    {
        $arr['targeting'] = [
            'country' => [
                'list' => $request->input('countriesList'),
                'is_excluded' => false
            ],
            'time_table' => [
                'list' => [
                    'Mon00'
                ],
                'is_excluded' => false

            ],
            'connection' => 'mobile',
            'os_type' => [
                'list' => [
                    'mobile'
                ],
                'is_excluded' => false
            ],
            'os' => [
                'list' => [
                    'ios'
                ],
                'is_excluded' => false
            ],
            'os_version' => [
                'list' => [
                    'ios13'
                ],
                'is_excluded' => false
            ],
            'traffic_categories' => [
                'propeller'
            ]
        ];
        return $arr;

    }

    //interstitial multiformat targeting
    public function multiFormatTargeting(Request $request): array
    {
        $arr['targeting'] = [
            'country' => [
                'list' => [
                    'in',
                    'us',
                    'it'
                ],
                'is_excluded' => false
            ],
            'time_table' => [
                'list' => [
                    'Mon00'
                ],
                'is_excluded' => false

            ],
            'connection' => 'mobile',
            'os_type' => [
                'list' => [
                    'mobile'
                ],
                'is_excluded' => false
            ],
            'os' => [
                'list' => [
                    'ios'
                ],
                'is_excluded' => false
            ],
            'os_version' => [
                'list' => [
                    'ios13'
                ],
                'is_excluded' => false
            ],
            'zone_type' => [
                'list' => [
                    38
                ],
                'is_excluded' => false
            ]

        ];
        return $arr;
    }

    public function optionalFields(Request $request): array
    {
        if($request->input('direction')=='onclick')
        {
            $arr['is_adblock_buy'] = 1;
        }

        $arr['daily_amount'] = 50;
        $arr['total_amount'] = 100;

        return $arr;

        //$arr['frequency'] = 3;
        //$arr['capping'] = 86400;
        //$arr['evenly_limits_usage'] = false;
        //$arr['cpa_goal_bid'] = 0.85;
        //$arr['cpa_goal_status'] = true;
        //$arr['daily_amount'] = 50;
        //$arr['total_amount'] = 100;

    }

    public function multiFormatOptional(Request $request): array
    {

        $arr['daily_amount'] = 50;
        $arr['total_amount'] = 100;

        return $arr;

        //$arr['frequency'] = 3;
        //$arr['capping'] = 86400;
        //$arr['evenly_limits_usage'] = false;
        //$arr['cpa_goal_bid'] = 0.85;
        //$arr['cpa_goal_status'] = true;

    }

    public function creativeFormat(Request $request):array
    {
        $arr['creatives']=[
            [
                'template_id'=> 10000000,
                'landing_url'=> 'https://www.base64encode.org/',
                'status'=>1
            ]
        ];

        return $arr;

    }
}
