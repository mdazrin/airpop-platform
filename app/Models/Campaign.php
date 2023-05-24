<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function domain(Request $request)
    {
        if($request->get('rate_model')=='scpa'||'cpag')
        {
            return '/?clickid=${SUBID}';
        }else
        {
            return '/?zoneid=zoneId';
        }

    }

}
