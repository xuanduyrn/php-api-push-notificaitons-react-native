<?php
  //continue
  $host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "fcm_db";
  $con = mysqli_connect($host, $db_user,$db_password,$db_name);

  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $body = isset($_POST['body']) ? $_POST['body'] : '';
  $date = date('Y-m-d H:i:s');

  $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
  $server_key = 'AAAAPe_-vpM:APA91bG56uQ5iYiJ5n7xrZq4BxvlTrRzzQF3tLWPdNwXSJPgy3ESHXn1KP-isI-bg3mExgZzpPc5BwwLE4Kb7XUAjXc_y3jOFctaCRyAFRsWCEQrPAzs0_v9gi539cT7mhk4Vb3vdWYV';
  $sql = "select token from fcm_info";
  $result = mysqli_query($con,$sql);

  $key = [];
  if( isset($_POST["Submit"])) {
    while($row=mysqli_fetch_assoc($result))
    {
      $key[] = $row["token"];
    }
  };

  $row = mysqli_fetch_row($result);
  $obj = json_decode(true);
  $Sql_Query = "INSERT INTO fcm_notifi (title, body, `DateTime`) VALUES ('$title','$body', '$date')";

  if(!empty($_POST))
    if(mysqli_query($con,$Sql_Query)){
        ?>
        <script type='text/javascript'>
          alert('Đã gửi thông báo thành công!')
          window.location.assign("/fcm?page=home")
        </script>

        <?php
      }else{
        echo 'Try Again';
    }


  $headers = array(
    'Authorization:key=' .$server_key,
    'Content-Type:application/json'
  );
  foreach ($key as $item) {

  $fields = array ('to'=>$item,
                  'notification'=> array('title'=>$title, 'body'=>$body, 'sound'=> 'default'), 'data' => array('show_in_foreground'=> true));

  $payload = json_encode($fields);
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
  mysqli_close($con);
?>
<!-- <div id="home" class="tab-pane fade in active"> -->
  <h3>Send To All Devices</h3>
  <form action="send_all_notif.php" method='post'>
    <label>Title</label>
    <input type="text" name="title" class="input-xlarge" style="height: 35px;">
    <label>Body</label>
    <input type="text" name="body" class="input-xlarge" style="height: 35px;">
    <div>
      <button type="submit" name="Submit" class="btn btn-primary">Send</button>
    </div>
  </form>
<!-- </div> -->
