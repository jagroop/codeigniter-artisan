<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification {

  /**
   * Suppoted devices to send push Notifications
   * IOS
   * ANDROID
   */
  const DEVICES = ['ios', 'android'];

  /**
   * Pass phrase of IOS
   * @var null
   */
  private $passPhrase = null;

  /**
   * Headers for android
   * @var array
   */
  private $headers = array();

  /**
   * Device Token
   * @var null
   */
  private $deviceToken = null;

  /**
   * Send notification to android device
   * @param  array $data Payload
   * @return void
   */
  private function android($data) {    

    $fields = array(
      'registration_ids' => array($this->deviceToken),
      'data' => $data,
    );   
    try {
      $result = array();
      $ch = curl_init();

      // curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
      curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      $result = json_decode(curl_exec($ch), true);    
      curl_close($ch);
      return $result;
    } catch (\Exception $e) {
      //
    }

  }

  /**
   * Send push notification to IOS device
   * @param  array $data Payload
   * @return void
   */
  private function ios($data) {

    try {
      $ctx = stream_context_create();
      stream_context_set_option($ctx, 'ssl', 'cafile', __DIR__ . '/entrust_2048_ca.cer');
      stream_context_set_option($ctx, 'ssl', 'verify_peer', false);
      stream_context_set_option($ctx, 'ssl', 'local_cert', __DIR__ . '/ck_dev.pem'); //sandbox
      // stream_context_set_option($ctx, 'ssl', 'local_cert', __DIR__ . '/ck.pem'); //live
      stream_context_set_option($ctx, 'ssl', 'passphrase', $this->$passPhrase);
      dd( stream_context_set_option($ctx, 'ssl', 'passphrase', $this->$passPhrase));
      // stream_context_set_option($ctx, 'ssl', 'verify_peer', false);

      $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx); //sandbox
      // $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx); //live

      $body['aps'] = $data;

      $payload = json_encode($body);

      $msg = chr(0) . pack('n', 32) . pack('H*', $this->deviceToken) . pack('n', strlen($payload)) . $payload;

      $result = fwrite($fp, $msg, strlen($msg));

      fclose($fp);
      return $result;
    } catch (\Exception $e) {
      //
    }

  }

  /**
   * Send Push Notification
   * @param  object $user    User Object
   * @param  array $payLoad Payload
   * @return mixed
   */
  public function send($user, $payLoad) {
    $token = trim(@$user['device_token']);
    $deviceType = trim(@$user['device_type']);
    if (in_array($deviceType, self::DEVICES) && $token != "") {
      $this->deviceToken = $token;
      $config = config_item('mobile');
      if ($deviceType === "android") {
        $apiKey = $config['android']['api_key'];        
        $this->headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');      
        return $this->android($payLoad);

      } elseif ($deviceType === "ios") {
        $this->passPhrase = $config['ios']['pass_phrase'];
        return $this->ios($payLoad);
      }

    }
    return false;
  }

}
