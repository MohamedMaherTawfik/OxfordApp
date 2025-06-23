<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class zoomController extends Controller
{
    public function livePage()
    {
        return view('teacherDashboard.zoom.live');
    }

    public function getAccessToken()
    {
        $clientId = env('ZOOM_CLIENT_ID');
        $clientSecret = env('ZOOM_CLIENT_SECRET');
        $accountId = env('ACCOUNT_ID');

        \Log::info('Zoom Auth Params', [
            'client_id' => $clientId,
            'client_secret' => substr($clientSecret, 0, 5) . '*****',
            'account_id' => $accountId,
        ]);

        $response = Http::withBasicAuth($clientId, $clientSecret)
            ->asForm()
            ->post('https://zoom.us/oauth/token', [
                'grant_type' => 'account_credentials',
                'account_id' => $accountId,
            ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json([
                'error' => 'Failed to get Zoom access token',
                'details' => $response->json(),
            ], $response->status());
        }
    }


    public function createMeeting(Request $request)
    {
        $accessToken = Http::withBasicAuth(
            env('ZOOM_CLIENT_ID'),
            env('ZOOM_CLIENT_SECRET')
        )->asForm()->post('https://zoom.us/oauth/token', [
                    'grant_type' => 'account_credentials',
                    'account_id' => env('ACCOUNT_ID'),
                ])->json()['access_token'];

        $response = Http::withToken($accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => $request->input('topic', 'Live Chat with Oxford'),
            'type' => 1,
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'join_before_host' => true,
            ],
        ]);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'data' => $response->json(),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => $response->json(),
            ], $response->status());
        }
    }
}