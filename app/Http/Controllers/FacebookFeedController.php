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

    // $helper = $facebook->getRedirectLoginHelper();
    // $accessToken = $helper->getAccessToken();

    // try {
    // } catch(Facebook\Exceptions\FacebookResponseException $e) {
    //   // When Graph returns an error
    //   echo 'Graph returned an error: ' . $e->getMessage();
    //   exit;
    // } catch(Facebook\Exceptions\FacebookSDKException $e) {
    //   // When validation fails or other local issues
    //   echo 'Facebook SDK returned an error: ' . $e->getMessage();
    //   exit;
    // }

    // if (!isset($accessToken)) {
    //   if ($helper->getError()) {
    //     header('HTTP/1.0 401 Unauthorized');
    //     echo "Error: " . $helper->getError() . "\n";
    //     echo "Error Code: " . $helper->getErrorCode() . "\n";
    //     echo "Error Reason: " . $helper->getErrorReason() . "\n";
    //     echo "Error Description: " . $helper->getErrorDescription() . "\n";
    //   } else {
    //     header('HTTP/1.0 400 Bad Request');
    //     echo 'Bad request';
    //   }
    //   exit;
    // }

    // // The OAuth 2.0 client handler helps us manage access tokens
    // $oAuth2Client = $facebook->getOAuth2Client();

    // // Get the access token metadata from /debug_token
    // $tokenMetadata = $oAuth2Client->debugToken($accessToken);

    // // Validate the access token
    // $tokenMetadata->validateAppId('app_id');

    // // Check if the access token is valid
    // if (!$accessToken->isLongLived()) {
    // //   Exchanges a short-lived access token for a long-lived one
    //     try {
    //       $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    //     } catch (Facebook\Exceptions\FacebookSDKException $e) {
    //       echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    //       exit;
    //     }

    //   echo '<h3>Long-lived</h3>';
    //   var_dump($accessToken->getValue());
    // }

    return view('test', compact('posts'));
  }

//   public function index()
//   {
//       $accessToken = 'EAASCabDdOzgBAPwN6Oy9NUU5e6bFxDGTNH4JHCPyzJ0tfRvhtZBZApiUqhG6vtSGBXZCePy8zqh7fSOpbDw70xih9SYcpYnG2WsXyOjrKVVoELB9SqZAtnzHZC40ynRIK2jKzWjIgEjoL2rwDFryhtEdFotEuWxV93zaZAJZAIW2jZB9kgQ0xn33ibZBZAHQLtmXXxFG8T7GssZCKqH7AaBQc64';
//       $facebook = new Facebook([
//           'app_id' => '1269290357308216',
//           'app_secret' => 'f6f3696ba4669168747fe3c21c1e66a4',
//           'default_graph_version' => 'v16.0',
//       ]);

//       try {
//           $response = $facebook->get('/3471802506478633/posts', $accessToken);
//           $posts = $response->getGraphEdge();
//       } catch (FacebookResponseException $e) {
//           // When Graph returns an error
//           echo 'Graph returned an error: ' . $e->getMessage();
//           exit;
//       } catch (FacebookSDKException $e) {
//           // When validation fails or other local issues
//           echo 'Facebook SDK returned an error: ' . $e->getMessage();
//           exit;
//       }
//       dd($posts);

//       return view('test', [
//           'data' => $posts,
//       ], compact('posts'));
//   }
}
