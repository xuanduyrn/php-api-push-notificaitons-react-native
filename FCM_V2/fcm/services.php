<?php
  function query($sql)
  {
    try {
      $host = "localhost";
      $db_user = "root";
      $db_password = "";
      $db_name = "fcm_db";
      $con = mysqli_connect($host, $db_user, $db_password, $db_name);

      $result = mysqli_query($con, $sql);
      mysqli_close($con);
      return $result;
    } catch (Exception $e) {
      return null;
    }
  }

  /**
   * Workfow of process send notify
   * @param array_index $token
   */
  function workflow_send_notify($title, $body, $token, $url_back)
  {
    $date = date('Y-m-d H:i:s');
    $obj = json_decode(true);
    $Sql_Query = "INSERT INTO fcm_notifi (title, body, `DateTime`) VALUES ('$title','$body', '$date')";

    if(query($Sql_Query)) {
      ?>
      <script type='text/javascript'>
        alert('Đã gửi thông báo thành công!')
        window.location.assign($url_back)
      </script>
      <?php
    } else {
      ?>
      <script type='text/javascript'>
        alert('Có lỗi')
        window.location.assign($url_back)
      </script>
      <?php
      
    }

    if(!empty($token)) {
      foreach ($token as $item) {
        $fields = [
          'to' => $item,
          'notification' => [
            'title' => $title,
            'body' => $body,
            'sound' => 'default' 
          ], 
          'data' => [
            'show_in_foreground'=> true
          ]
        ];

        send_notify($fields);
      }
    }
  }

  /**
   * Send notify proceduce
   * @param array_assoc $field
   */
  function send_notify($field)
  {
    $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
    $server_key = 'AAAAPe_-vpM:APA91bG56uQ5iYiJ5n7xrZq4BxvlTrRzzQF3tLWPdNwXSJPgy3ESHXn1KP-isI-bg3mExgZzpPc5BwwLE4Kb7XUAjXc_y3jOFctaCRyAFRsWCEQrPAzs0_v9gi539cT7mhk4Vb3vdWYV';
  
    $headers = array(
      'Authorization:key=' .$server_key,
      'Content-Type:application/json'
    );

    $payload = json_encode($field);
    $curl_session = curl_init();
    curl_setopt( $curl_session,CURLOPT_URL, $path_to_fcm );
    curl_setopt( $curl_session,CURLOPT_POST, true );
    curl_setopt( $curl_session,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $curl_session,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $curl_session,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $curl_session,CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
    curl_setopt( $curl_session,CURLOPT_POSTFIELDS, $payload );

    $result = curl_exec($curl_session);
    curl_close($curl_session);
  }