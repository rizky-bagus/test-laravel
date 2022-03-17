<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * Every base request that use guzzle for hitting API from anywhere
 * NOTE: Please update this file for upcoming feature from pegadaian
 * NOTE: Every feature that integrating to core is using this Service for hitting api from core
 * 
 * @author Rizky Bagus Pangestu
 */
class GuzzleService
{
    /**
     * Request with basic token
     * @param url = Endpoint url api (common used for core pegadaian url)
     * @param method = method of request
     * @param queryParams = Array query string parameter of request
     * @param json = Array body of request
     * @method GET | POST
     * @author Rizky Bagus Pangestu
     */
    public function basicRequest($url, $method, array $queryParams = null, array $json = null)
    {
        try {
            $client = new Client();
            
            /**
             * Check the method first
             * NOTE: If u want to make another method in guzzle such as DELETE or PUT, just make more nested with IF or Case.
             */
            $guzzleRequest = strtolower($method) == 'get'
                ? $client->get($url, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ],
                    'query' => $queryParams,
                    'json' => $json
                ])
                : $client->post($url, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ],
                    'query' => $queryParams,
                    'json' => $json
                ]);
                
			$decode = json_decode($guzzleRequest->getBody(), true);

			return response()->json($decode);
		} catch(\Exception $e) {
			return response()->json([
				'status' => 'Error',
				'message' => $e->getMessage()
			], 500);
		}
    }

     /**
     * Request with bearer token
     * @param url = Endpoint url api (common used for core pegadaian url)
     * @param token = token
     * @method POST
     * @author Rizky Bagus Pangestu
     */
    public function bearerRequestPost($url, $token, array $json = null)
    {
        try {
	        $client = new Client();

            $guzzleRequest = $client->post($url, [
                'headers' => [
					'Accept' => 'application/json',
					'Content-Type' => 'application/json',
					'Authorization' => 'Bearer ' . $token
				],
                'json' => $json
            ]);
                
			$decode = json_decode($guzzleRequest->getBody(), true);

			return response()->json($decode);
		} catch(\Exception $e) {
			return response()->json([
				'status' => 'Error',
				'message' => $e->getMessage()
			], 500);
		}
    }

    /**
     * Request with bearer token
     * @param url = Endpoint url api (common used for core pegadaian url)
     * @param token = token
     * @param queryParams = query string parameter of request
     * @method GET
     * @author Rizky Bagus Pangestu
     */
    public function bearerRequestGet($url)
    {
        try {
	        $client = new Client();

            $guzzleRequest = $client->get($url, [
                'headers' => [
					'Accept' => 'application/json',
					'Content-Type' => 'application/json'
				],
            ]);
                
			$decode = json_decode($guzzleRequest->getBody(), true);

			return response()->json($decode);
		} catch(\Exception $e) {
			return response()->json([
				'status' => 'Error',
				'message' => $e->getMessage()
			], 500);
		}
    }

    /**
     * Request with bearer token
     * @param url = Endpoint url api (common used for core pegadaian url)
     * @param token = token
     * @param multipart = file request
     * @method POST
     * @author Rizky Bagus Pangestu
     */
    public function bearerMultipartRequestPost($url, $token, array $multipart = null)
    {
        try {
	        $client = new Client();

            $guzzleRequest = $client->post($url, [
                'headers' => [
					'Accept' => 'application/json',
					'Authorization' => 'Bearer ' . $token
				],
                'multipart' => $multipart
            ]);
                
			$decode = json_decode($guzzleRequest->getBody(), true);

			return response()->json($decode);
		} catch(\Exception $e) {
			return response()->json([
				'status' => 'Error',
				'message' => $e->getMessage()
			], 500);
		}
    }

    public function basicMultipartRequestPost($url, array $multipart = null)
    {
        try {
	        $client = new Client();

            $guzzleRequest = $client->post($url, [
                'headers' => [
					'Accept' => 'application/json',
					'Authorization' => 'Basic ' . config('core.CORE_TOKEN_DEVELOP')
				],
                'multipart' => $multipart
            ]);
                
			$decode = json_decode($guzzleRequest->getBody(), true);

			return response()->json($decode);
		} catch(\Exception $e) {
			return response()->json([
				'status' => 'Error',
				'message' => $e->getMessage()
			], 500);
		}
    }
}