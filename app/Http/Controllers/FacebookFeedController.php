<?php

namespace App\Http\Controllers;


use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

use Illuminate\Http\Request;

class FacebookFeedController extends Controller
{

    public function scrapeFacebook()
    {
        $facebook = new Facebook([
            'app_id' => '1269290357308216',
            'app_secret' => 'f6f3696ba4669168747fe3c21c1e66a4',
            'default_graph_version' => 'v10.0',
        ]);

        $response = $facebook->get('/116189751384283/posts?fields=id,message,created_time,full_picture', 'EAASCabDdOzgBAGUSuYb0zft6uV8VTrJEz0ABve5hguPohWbwXi84HmYhnxfpEF79gi3BZAXkqK3FGruKz8FUgtMdY462fRxIsPGs2mQoNi9kJkUibopZAm2jts41vvtNPsnORaM7dW0q4j94SzOwYG6Qq50vsn7hlbZBabS6X1UFvRKHZCYLpv2DKwhGZBBrfdq7SQZA4RyocK4S7Mew8L');
        $posts = $response->getGraphEdge();

        // foreach ($posts as $post) {
        //     $message = $post->getField('message');
        //     $createdTime = $post->getField('created_time');

        //     // Do something with the data...
        // }

        return view('test', compact('posts'));
        
    }

    // public function index()
    // {
    //     $accessToken = 'EAASCabDdOzgBAOVZCWiR5ZAafl2nxwXHZC4vCMHhwEpSeAvgS6F3HhQzPZATvZBZCZAOdTWbC1feVHZBTaAJSMRPp3bT0OrWVtF2BEvrk5UlmpH4pnZA1QZBmRi7MOXZCplSXFIfEVtNcqjx3seV1X1Q5F8rHHvKDq3hSdFkZA1Wtn6d1n2tPwEVvP7edZCAqXOgWgcRuGdZCYwmZCZC2MCtgZAAyjdSP';
    //     $facebook = new Facebook([
    //         'app_id' => '1269290357308216',
    //         'app_secret' => 'f6f3696ba4669168747fe3c21c1e66a4',
    //         'default_graph_version' => 'v9.0',
    //     ]);

    //     try {
    //         $response = $facebook->get('/3471802506478633/posts', $accessToken);
    //         $posts = $response->getGraphEdge();
    //     } catch (FacebookResponseException $e) {
    //         // When Graph returns an error
    //         echo 'Graph returned an error: ' . $e->getMessage();
    //         exit;
    //     } catch (FacebookSDKException $e) {
    //         // When validation fails or other local issues
    //         echo 'Facebook SDK returned an error: ' . $e->getMessage();
    //         exit;
    //     }

    //     return view('test', [
    //         'posts' => $posts,
    //     ], compact('posts'));
    // }
}
