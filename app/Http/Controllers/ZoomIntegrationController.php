<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Interview;

class ZoomIntegrationController extends Controller
{
    // Generate Zoom access token using OAuth
    public  function generateZoomAccessToken()
    {
        $apiKey = env('Client_id');
        $apiSecret = env('Client_service');
        $accountId = env('Account_id');

        $base64Credentials = base64_encode("$apiKey:$apiSecret");

        $url = 'https://zoom.us/oauth/token?grant_type=account_credentials&account_id=' . $accountId;


        $response = Http::withHeaders([
            'Authorization' => "Basic $base64Credentials",
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post($url);


        $responseData = $response->json();
        if (isset($responseData['access_token'])) {
            return $responseData['access_token'];
        } else {
            Log::error('Zoom OAuth Token Response: ' . json_encode($responseData));
            return null;
        }
    }

    //convert datetime to Zoom format
    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);
            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            Log::error('toZoomTimeFormat: ' . $e->getMessage());
            return '';
        }
    }

    // Create a Zoom meeting using admin account
    public function createZoomMeeting($interviewData, $scheduledAt, $duration = 60)
    {
        $accessToken = $this->generateZoomAccessToken();

        if (!$accessToken) {
            return [
                'success' => false,
                'error' => 'Failed to generate Zoom access token'
            ];
        }

        // Get interviewer and candidate names
        $interviewer = User::findOrFail($interviewData['interviewer_id']);
        // dd($interviewer->name);

        $candidate = Candidate::findOrFail($interviewData['candidate_id']);

        $candidateName = $candidate->first_name . ' ' . $candidate->last_name;
        $meetingTopic = "Interview: {$interviewer->name} with {$candidateName}";

        $meetingAgenda = "Interview scheduled for {$scheduledAt}";




        $url = 'https://api.zoom.us/v2/users/me/meetings';


        $response = Http::withToken($accessToken)->post($url, [
            'topic' => $meetingTopic,
            'type' => 2,
            'start_time' => $this->toZoomTimeFormat($scheduledAt),
            'duration' => $duration,
            'agenda' => $meetingAgenda,
            'timezone' => 'Africa/Cairo',
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'join_before_host' => true,
                'mute_upon_entry' => false,
                'waiting_room' => false,
                'approval_type' => 0,
                'audio' => 'both',
                'auto_recording' => 'none'
            ]
        ]);
        // dd($response->json());

        if ($response->successful()) {
            return [
                'success' => true,
                'data' => $response->json()
            ];
        } else {
            Log::error('Zoom Meeting Creation Error: ' . $response->body());
            return [
                'success' => false,
                'error' => 'Failed to create Zoom meeting',
                'details' => $response->json()
            ];
        }
    }



    // Delete a Zoom meeting
    public function deleteZoomMeeting($meetingId)
    {
        $accessToken = $this->generateZoomAccessToken();

        if (!$accessToken) {
            return [
                'success' => false,
                'error' => 'Failed to generate Zoom access token'
            ];
        }

        $url = 'https://api.zoom.us/v2/meetings/' . $meetingId;

        $response = Http::withToken($accessToken)->delete($url);
        // dd($response->json());

        if ($response->successful()) {
            return [
                'success' => true
            ];
        } else {
            Log::error('Zoom Meeting Deletion Error: ' . $response->body());
            return [
                'success' => false,
                'error' => 'Failed to delete Zoom meeting',
                'details' => $response->json()
            ];
        }
    }
}
