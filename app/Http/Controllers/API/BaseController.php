<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
	
	/**
     * Generate Random Number
     */
    public function generateRandomNumber($length = 4)
    {
      	$otp = str_pad(rand(0, pow(10, $length)-1), $length, '0', STR_PAD_LEFT);
        //$otp = '1234';
    	return $otp;
      
    }

    public function sendSMS($mobileNumber,$code){
        
        $mass= "OTP for registration is $code. From Robustaura Wellness P L.";
        $mass = urlencode($mass);
        $url = "http://173.45.76.227/send.aspx?username=wellbe&pass=Wellbe@123&route=trans1&senderid=WELLRO&numbers=$mobileNumber&message=$mass&templateid=1707169804848702949";
   

        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($crl);
        $err = curl_error($crl);

        curl_close($crl);

    }
	
}