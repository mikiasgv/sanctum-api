<?php

namespace App\Http\Controllers;

use CventClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

class FirstController extends Controller
{
    public function index()
    {
        //return response(['name' => 'miki']);
        $access_token = json_decode($this->getAccessToken(), true);

        echo($access_token['access_token']);

        $headers = [
            'Accept' => 'application/json',
            'x-api-key' => '698q27fv62ulh9a30ken6pi1eb',
            'Authorization' => 'Bearer ' .$access_token['access_token'],

        ];

        $client = new Client([
            'headers' => $headers,
        ]);
            //https://api-platform.cvent.com/ea/meeting-request-forms
            //https://api-platform.cvent.com/ea/events
        //$response = $client->request('GET', 'https://api-platform.cvent.com/ea/meeting-request-forms');
        $response = $client->request('GET', 'https://api-platform.cvent.com/ea/events');

        //$events = json_decode($response->getBody(), true);
        $events = json_decode($response->getBody(), true);

        // $data = [];
        // $data['paging'] = $events['paging'];
        // $data['events'] = $events['data'];
        //dd($events['data']);

        return $events['data'];
    }


    protected function getAccessToken()
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic Njk4cTI3ZnY2MnVsaDlhMzBrZW42cGkxZWI6bGtlYmxuNG12MmhoZTQyZjU4am1yZDAyZW00amd1OG5sMjMzOGJuMG01azA4YWw3bWFo',

        ];

        $client = new Client([
            'headers' => $headers,
        ]);

        $response = $client->request('POST', 'https://api-platform.cvent.com/auth/v1/oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => '698q27fv62ulh9a30ken6pi1eb',
            ]
        ]);

        return $response->getBody();
    }
}
