<?php
  //continue
  $host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "fcm_db";
  $con = mysqli_connect($host, $db_user,$db_password,$db_name);

  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $body = isset($_POST['body']) ? $_POST['body'] : '';

  $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
  $server_key = 'AAAAPe_-vpM:APA91bG56uQ5iYiJ5n7xrZq4BxvlTrRzzQF3tLWPdNwXSJPgy3ESHXn1KP-isI-bg3mExgZzpPc5BwwLE4Kb7XUAjXc_y3jOFctaCRyAFRsWCEQrPAzs0_v9gi539cT7mhk4Vb3vdWYV';
  $sql = "select token, username from fcm_info";
  $result = mysqli_query($con,$sql);
  $options = "";
  $username = "";

  while($row = mysqli_fetch_array($result))
  {
    $options = $options."<option >$row[token]</option>";
    $username = $username."<option value=$row[token]>$row[username]</option>";
  }
  $row = mysqli_fetch_row($result);
  $key = isset($_POST['DropDownTimezone']) ? $_POST['DropDownTimezone'] : $row[0];

  $obj = json_decode(true);
  $Sql_Query = "INSERT INTO fcm_notifi (title, body) VALUES ('$title','$body')";

if(!empty($_POST))
  if(mysqli_query($con,$Sql_Query)){
      echo "<script type='text/javascript'>alert('Đã gửi thông báo thành công!');</script>";
    }else{
      echo 'Try Again';
  }


  $headers = array(
    'Authorization:key=' .$server_key,
    'Content-Type:application/json'
  );
  $fields = array ('to'=>$key,
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
  mysqli_close($con);
?>


<!-- HTML -->
<html lang="en">
<head>
  <title>test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
  <h2>test</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home"><i style="font-size:24px" class="fa">&#xf015;</i></a></li>
    <li><a href="#ios"><i style="font-size:24px" class="fa">&#xf179;</i></a></li>
    <li><a href="#android"><i style="font-size:24px" class="fa">&#xf17b;</i></a></li>
    <li><a href="#user"><i style="font-size:24px" class="fa">&#xf2be;</i></a></li>
  </ul>

  <div class="tab-content">

    <!-- Tab All -->
    <div id="home" class="tab-pane fade in active">
      <h3>Send To All Device</h3>
      <form id="tab" action="send_all_notif.php" method='post'>
            <label>Title</label>
            <input type="text" name="title" class="input-xlarge" style="height: 35px;">
            <label>Body</label>
            <input type="text" name="body" class="input-xlarge" style="height: 35px;">
          	<div>
        	    <button type="submit" name="Submit" class="btn btn-primary">Send</button>
        	</div>
        </form>
    </div>
    <!-- Tab All -->

    <!-- Tab IOS -->
    <div id="ios" class="tab-pane fade">
      <h3>Send To IOS Device</h3>
      <form id="tab" action="send_ios_notifi.php" method='post'>
            <label>Title</label>
            <input type="text" name="title" class="input-xlarge" style="height: 35px;">
            <label>Body</label>
            <input type="text" name="body" class="input-xlarge" style="height: 35px;">
          	<div>
        	    <button type="submit" name="Submit" class="btn btn-primary">Send</button>
        	</div>
        </form>
    </div>
    <!-- Tab IOS -->

    <!-- Tab Android -->
    <div id="android" class="tab-pane fade">
      <h3>Send To Android Device</h3>
      <form id="tab" action="send_android_notifi.php" method='post'>
            <label>Title</label>
            <input type="text" name="title" class="input-xlarge" style="height: 35px;">
            <label>Body</label>
            <input type="text" name="body" class="input-xlarge" style="height: 35px;">
          	<div>
        	    <button type="submit" name="Submit" class="btn btn-primary">Send</button>
        	</div>
        </form>
    </div>
    <!-- Tab Android -->

    <!-- Tab User -->
    <div id="user" class="tab-pane fade">
      <h3>Send To Each User</h3>
      <form id="tab" action="user_send_notif.php" method='post'>
            <label>Title</label>
            <input type="text" name="title" class="input-xlarge" style="height: 35px;">
            <label>Body</label>
            <input type="text" name="body" class="input-xlarge" style="height: 35px;">
            <label>Chọn Người Gửi</label>
            <select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
              <?php
                echo $username ;
              ?>
            </select>
          	<div>
        	    <button type="submit" name="Submit" class="btn btn-primary">Send</button>
        	</div>
        </form>
    </div>
    <!-- Tab User -->
  </div>
</div>

<script src="script.js"></script>

</body>
</html>
