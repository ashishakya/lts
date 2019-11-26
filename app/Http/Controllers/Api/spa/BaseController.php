<?php

namespace App\Http\Controllers\Api\spa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class BaseController
 * @package App\Http\Controllers\Api
 */
class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @param array  $result
     * @param string $message
     *
     * @param int    $code
     *
     * @return Response
     */
    public function sendResponse(array $result, string $message, int $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @param       $error
     * @param array $errorMessages
     * @param int   $code
     *
     * @return Response
     */
    public function sendError($error, array $errorMessages = [], int $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if ( !empty($errorMessages) ) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}

