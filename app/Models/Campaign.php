<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Campaign extends Model
{
    use HasFactory;

    public function propadsTimetable()
    {
        if(!Cache::has('propads_timetable')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/time_table');

            Cache::put('propads_timetable', $var->json());
        }
        return Cache::get('propads_timetable');

    }

    public function propadsOsVersion()
    {
        if(!Cache::has('propads_os_version')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/os_version');

            Cache::put('propads_os_version', $var->json());
        }
        return Cache::get('propads_os_version');

    }

    public function propadsOsType()
    {
        if(!Cache::has('propads_os_type')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/os_type');

            Cache::put('propads_os_type', $var->json());
        }
        return Cache::get('propads_os_type');

    }

    public function propadsOs()
    {
        if(!Cache::has('propads_os')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/os');

            Cache::put('propads_os', $var->json());
        }
        return Cache::get('propads_os');

    }

    public function propadsDeviceType()
    {
        if(!Cache::has('propads_device_type')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/device_type');

            Cache::put('propads_device_type', $var->json());
        }
        return Cache::get('propads_device_type');

    }

    public function propadsDevice()
    {
        if(!Cache::has('propads_device')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/device');

            Cache::put('propads_device', $var->json());
        }
        return Cache::get('propads_device');

    }

    public function propadsBrowser()
    {
        if(!Cache::has('propads_browser')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/browser');

            Cache::put('propads_browser', $var->json());
        }
        return Cache::get('propads_browser');

    }

    public function propadsZone()
    {
        if(!Cache::has('propads_zone')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/zone');

            Cache::put('propads_zone', $var->json());
        }
        return Cache::get('propads_zone');

    }

    public function propadsConnection()
    {
        if(!Cache::has('propads_connection')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/connection');

            Cache::put('propads_connection', $var->json());
        }
        return Cache::get('propads_connection');

    }

    public function propadsMobileIsp()
    {
        if(!Cache::has('propads_mobile_isp')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/mobile_isp');

            Cache::put('propads_mobile_isp', $var->json());
        }
        return Cache::get('propads_mobile_isp');

    }

    public function propadsProxy()
    {
        if(!Cache::has('propads_proxy')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/proxy');

            Cache::put('propads_proxy', $var->json());
        }
        return Cache::get('propads_proxy');

    }

    public function propadsLanguage()
    {
        if(!Cache::has('propads_language')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/language');

            Cache::put('propads_language', $var->json());
        }
        return Cache::get('propads_language');

    }

    public function propadsAudience()
    {
        if(!Cache::has('propads_audience')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/audience');

            Cache::put('propads_audience', $var->json());
        }
        return Cache::get('propads_audience');

    }

    public function propadsTrafficCategories()
    {
        if(!Cache::has('propads_traffic_categories')) {

            $var = Http::withToken('b616d04fe21127a046c5fcf4024106dadef4792d9e7a889a')
                ->get('https://ssp-api.propellerads.com/v5/collections/targeting/traffic_categories');

            Cache::put('propads_traffic_categories', $var->json());
        }
        return Cache::get('propads_traffic_categories');

    }






}
