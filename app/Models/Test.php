<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Test extends Model
{
    use HasFactory;

    const token = 'b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a';

    public function coreFields(Request $request): array
    {
        $arr['name'] = 'test';
        $arr['direction'] = 'onclick';
        $arr['rate_model'] = 'scpm';
        $arr['target_url'] = 'https://propellerads.com/?zoneid=zoneId';
        $arr['status'] = 1;
        $arr['started_at'] = '17/6/2023';
        $arr['expired_at'] = '18/6/2023';
        $arr['timezone'] = 3;
        $arr['rates'] =  [
            [
                'countries' => [
                    'in'
                ],
                'amount' => 0.5
            ],
            [
                'countries' => [
                    'us',
                    'it'
                ],
                'amount' => 0.9
            ]
        ];
        return $arr;

    }

    public function targetingFields(Request $request): array
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
            'traffic_categories' => [
                'propeller'
            ]
        ];
        return $arr;

    }

    public function optionalFields(Request $request): array
    {
        $arr['frequency'] = 3;
        $arr['capping'] = 86400;
        $arr['is_adblock_buy'] = 1;
        $arr['evenly_limits_usage'] = false;
        $arr['cpa_goal_bid'] = 0.85;
        $arr['cpa_goal_status'] = true;
        $arr['daily_amount'] = 50;
        $arr['total_amount'] = 100;

        return $arr;

    }


}
