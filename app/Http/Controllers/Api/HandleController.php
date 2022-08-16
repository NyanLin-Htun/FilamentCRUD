<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HandleController extends Controller
{
    public function handleResponse($result, $msg)
    {
        $res = [
            'success' => true,
            'data' => $result,
            'message' => $msg
        ];
        return response()->json($res, 200);
    }

    public function handleError($error, $errMsg = [], $code = 404)
    {
        $res = [
            'success' => false,
            'message' => $error
        ];
        if (!empty($errMsg)) {
            $res['data'] = $errMsg;
        }
        return response()->json($res, $code);
    }
}
