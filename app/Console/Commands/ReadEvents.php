<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ReadEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read events from cvent every certain time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = $this->getEvents();

        $eventObj = new Event();



        foreach($events as $event) {
            $eventInDB = Event::where('cventId', $event['id'])->first();
            //dd($eventInDB);
            if($eventInDB) {
                $eventInDB->update([
                    'cventId' => $event['id'],
                    'title'  =>  $event['title'],
                    'code'  =>  $event['code'],
                    'start'  =>  $event['start'],
                    'end'  =>  $event['end'],
                    'closeAfter'  =>  $event['closeAfter'],
                    'archiveAfter'  =>  $event['archiveAfter'],
                    'timezone'  =>  $event['timezone'],
                    'venues'    =>  array_key_exists('venues', $event) ? json_encode($event['venues']) : json_encode([]),
                    'currency'  =>  $event['currency'],
                    'registrationSecurityLevel'  =>  $event['registrationSecurityLevel'],
                    'status'  =>  $event['status'],
                    'testMode'  =>  $event['testMode'],
                    'planners'  =>  array_key_exists('planners', $event) ? json_encode($event['planners']) : json_encode([]),
                    'created'  =>  $event['created'],
                    'lastModified'  =>  $event['lastModified']
                ]);
            }else {
                $eventObj::create([
                    'cventId' => $event['id'],
                    'title'  =>  $event['title'],
                    'code'  =>  $event['code'],
                    'start'  =>  $event['start'],
                    'end'  =>  $event['end'],
                    'closeAfter'  =>  $event['closeAfter'],
                    'archiveAfter'  =>  $event['archiveAfter'],
                    'timezone'  =>  $event['timezone'],
                    'venues'    =>  array_key_exists('venues', $event) ? json_encode($event['venues']) : json_encode([]),
                    'currency'  =>  $event['currency'],
                    'registrationSecurityLevel'  =>  $event['registrationSecurityLevel'],
                    'status'  =>  $event['status'],
                    'testMode'  =>  $event['testMode'],
                    'planners'  =>  array_key_exists('planners', $event) ? json_encode($event['planners']) : json_encode([]),
                    'created'  =>  $event['created'],
                    'lastModified'  =>  $event['lastModified']
                ]);
            }

        }
    }

    public function getEvents()
    {
        $access_token = json_decode($this->getAccessToken(), true);

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
