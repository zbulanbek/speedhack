<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function errorMessage($message, $code = 500)
    {
    	return response()->json([
    		'status' => 'error',
    		'message' => $message
    	], $code);
    }

    public function errorMessageValidation($errors, $code = 422)
    {
        return response()->json([
            'errors' => $errors,
        ], $code);
    }

    public function successMessage($message = '')
    {
    	return response()->json([
    		'status' => 'success',
    		'message' => $message
    	], 200);
    }
}
