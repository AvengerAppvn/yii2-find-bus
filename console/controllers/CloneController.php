<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use facebook\Facebook;
/**
 * @author Lex
 */
class CloneController extends Controller
{
        
    public function actionGroup(){
      echo "Start...\n";
        $fb = new \Facebook\Facebook([
        'app_id' => '131291997540588',
        'app_secret' => 'ecbee8fee77efc7052afeb2c4dca9b62',
        'default_graph_version' => 'v2.10',
        //'default_access_token' => '{access-token}', // optional
      ]);
      try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get(
          '/1792913834286901/feed',
          'EAAB3aMzgEOwBAHs2H06PJ7MsFZC0ZCZAxcMVSNS8RwlyTKplHnexFUJdZCk2N6smPi7ZBV20IDY7p01eDgEr9068idCibDzrmrCvCB3AF1eiJJsbRQeXTChW2xmUEbj3ItxxA18JKp2zA9YLGD004dXqpeI7n5GVqxyxuYWN6qZAvObvyWLQy7p9UfC3vlASsZD'
        );
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
      var_dump($response);
    
    }
    public function actionView()
    {
      echo "Start...\n";
        $fb = new \Facebook\Facebook([
        'app_id' => '131291997540588',
        'app_secret' => 'ecbee8fee77efc7052afeb2c4dca9b62',
        'default_graph_version' => 'v2.10',
        //'default_access_token' => '{access-token}', // optional
      ]);

      // Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
      //   $helper = $fb->getRedirectLoginHelper();
      //   $helper = $fb->getJavaScriptHelper();
      //   $helper = $fb->getCanvasHelper();
      //   $helper = $fb->getPageTabHelper();

      try {
        // Get the \Facebook\GraphNodes\GraphUser object for the current user.
        // If you provided a 'default_access_token', the '{access-token}' is optional.
        $response = $fb->get('/me', 'EAAB3aMzgEOwBAHs2H06PJ7MsFZC0ZCZAxcMVSNS8RwlyTKplHnexFUJdZCk2N6smPi7ZBV20IDY7p01eDgEr9068idCibDzrmrCvCB3AF1eiJJsbRQeXTChW2xmUEbj3ItxxA18JKp2zA9YLGD004dXqpeI7n5GVqxyxuYWN6qZAvObvyWLQy7p9UfC3vlASsZD');
      } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        echo "\n";
        echo "End...\n";
        exit;
      } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      $me = $response->getGraphUser();
      var_dump($response);
      echo 'Logged in as ' . $me->getName();
    }
}
