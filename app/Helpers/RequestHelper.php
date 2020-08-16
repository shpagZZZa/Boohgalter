<?php


namespace App\Helpers;


use Illuminate\Http\Request;

class RequestHelper
{
    public static function fillArrayFromRequest(string $element, Request $request)
    {
        $num = 1;
        $result = array();
        while ($request->input($element.$num))
        {
            array_push($result, $request->input($element.$num));
            $num++;
        }
        return $result;
    }
}
