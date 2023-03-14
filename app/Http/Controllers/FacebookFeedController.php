<?php

namespace App\Http\Controllers;


use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

use Illuminate\Http\Request;

class FacebookFeedController extends Controller
{
    
    //oauth/access_token?grant_type=fb_exchange_token&client_id=1269290357308216&client_secret=f6f3696ba4669168747fe3c21c1e66a4&fb_exchange_token=EAASCabDdOzgBANqvRZC1ygL31aZB8J4uaKC7vtthRbGT03d58WZC3ZA4n5KQfdWxUqiTRQDfEVtlgNBusvXBrbesiMRTdCiCgpSwH6AEE2YcwjE2SO2142RUoo0S6X0BjyTAz2ZAQZA5i7LkfVnkhQTA8ozogpNm2dXUzZBVtshSkJka4giivlrJ6QEDiR8LZBWjIavc1XsQQnf9gLZC7MjlH
    
  public function scrapeFacebook()
  {
    $facebook = new Facebook([
      'app_id' => '1269290357308216',
      'app_secret' => 'f6f3696ba4669168747fe3c21c1e66a4',
      'default_graph_version' => 'v16.0',
    ]);

    $accessToken = 'EAASCabDdOzgBADPxV7dsZA7d2mo9024bB9UQZBDXowqBBnVNGU3wo06orFtljTZARNCRI8L6LBmxNVAFKMG9nB7fDxMIcJSMCY57q40uK3o3Rs7ZCjhR5LO5eWChozXlSb9PqirtAMXQ7VFaE98yVCeO3gAQaVV1qHpAEOG1CvZAuCYngQZAgV';

    $response = $facebook->get('/116189751384283/posts?fields=id,message,created_time,full_picture', $accessToken);
    $posts = $response->getGraphEdge();

    foreach ($posts as $post) {
        $message = $post->getField('message');
        $createdTime = $post->getField('created_time');

        // Do something with the data...
    }

    return view('test', compact('posts'));
  }
}
