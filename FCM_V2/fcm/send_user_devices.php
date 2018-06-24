<?php
  require_once("services.php");

  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $body = isset($_POST['body']) ? $_POST['body'] : '';

  if (!empty($_POST)) {
    if (!empty($_POST['username'])) {
      $token = [];

      $sql = "select tokenAndroid, tokenIOS from fcm_info where username ='" . $_POST['username'] . "'";
      $result = query($sql);
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if ($row["tokenAndroid"])
            $token[] = $row["tokenAndroid"];
          if ($row["tokenIOS"])
            $token[] = $row["tokenIOS"];
        }
        workflow_send_notify($title, $body, $token, "/fcm/?page=user");
      } else {
        ?>
        <script type='text/javascript'>
          alert('Không tìm thấy người dùng')
        </script>
      <?php
      }
    } else {
      ?>
        <script type='text/javascript'>
          alert('Vui lòng nhập người dùng')
        </script>
      <?php
    }
  ?>
    <script type='text/javascript'>
      window.history.go(-1)
    </script>
  <?php
  } else {
  ?>
  <h3>Send To A User</h3>
  <form action="send_user_devices.php" method='post'>
    <label>Title</label>
    <input type="text" name="title" class="input-xlarge" style="height: 35px;">
    <label>Body</label>
    <input type="text" name="body" class="input-xlarge" style="height: 35px;">
    <label>Username</label>
    <input type="text" name="username" class="input-xlarge" style="height: 35px;">
    <div>
      <button type="submit" name="Submit" class="btn btn-primary">Send</button>
  	</div>
  </form>
<?php
  }
?>