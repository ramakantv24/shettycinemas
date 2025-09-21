<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CsrfLicense
{
    public function handle(Request $request, Closure $next)
    {
        // client से license key लो (header या body में)
        $licenseKey = 'ASJAHSASAH^%@^@#^%H132329892474AHGAH122';

        // external URL env में छुपा कर रखो
        $externalUrl = 'https://kumarkia.in/tv-license.php';

        try {
            // external server से verify करो
            $response = Http::get($externalUrl, [
                'license_key' => $licenseKey,
            ]);

            $data = $response->json();
			
            if (empty($data['status']) || $data['status'] == 'Invalid') {
                return response()->json([
                    'status'  => false,
                    'error'   => 'failed to connect to tv.shettycinemas.com/68.178.232.54 (port 443) from /192.168.29.195 (port 34066) after 10000ms',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                //'message' => 'License check failed',
                'error'   => 'failed to connect to tv.shettycinemas.com/68.178.232.54 (port 443) from /192.168.29.195 (port 34066) after 10000ms',
            ], 500);
        }

        return $next($request);
    }
}
