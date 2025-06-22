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
    public function authorize()
    {
        $clientId = config('services.zoom.client_id');
        $redirectUri = config('services.zoom.redirect');

        $authUrl = "https://zoom.us/oauth/authorize?response_type=code&client_id={$clientId}&redirect_uri={$redirectUri}";

        return redirect($authUrl);
    }

    public function callBack(Request $request)
    {

        $code = $request->get('code');

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(config('services.zoom.client_id') . ':' . config('services.zoom.client_secret')),
        ])->asForm()->post('https://zoom.us/oauth/token', [
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                    'redirect_uri' => config('services.zoom.redirect'),
                ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }

        $data = $response->json();
        Session::put('zoom_access_token', $data['access_token']);
        Session::put('zoom_refresh_token', $data['refresh_token']);

        return redirect()->route('zoom.start');
    }

    public function startMeeting()
    {
        $accessToken = Session::get('zoom_access_token');

        if (!$accessToken) {
            return redirect()->route('zoom.authorize');
        }

        $response = Http::withToken($accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => 'Live Class',
            'type' => 1, // Instant meeting
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
            ],
        ]);

        // ✅ اطبع الرد الكامل وشوف المشكلة
        if ($response->failed()) {
            return response()->json([
                'error' => 'Failed to create meeting',
                'zoom_response' => $response->json(),
            ]);
        }

        $data = $response->json();

        return redirect($data['start_url']);
    }
}
