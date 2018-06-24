<!-- HTML -->
<html lang="en">
<head>
  <title>Saigon Ship Push Notification</title>
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
  <h2>Send Push Notification</h2>
  <ul class="nav nav-tabs">
    <?php
     $menu = [
       [
         "page" => "home",
         "icon" => "&#xf015;"
       ],
       [
         "page" => "ios",
         "icon" => "&#xf179;"
       ],
       [
         "page" => "android",
         "icon" => "&#xf17b;"
       ],
       [
         "page" => "user",
         "icon" => "&#xf2be;"
       ],
     ];
     $page = isset($_GET['page']) ? $_GET['page'] : "home";
     foreach ($menu as $item) {
       $check = $page === $item["page"];
       ?>
        <li <?= $check ? "class='active'" : ""?>>
          <a href="/fcm/?page=<?= $item["page"] ?>">
            <i style="font-size:24px" class="fa"><?= $item["icon"] ?></i>
          </a>
        </li>
       <?php
     }
    ?>

  </ul>

  <div class="tab-content">
    <?php
      switch ($page) {
        case 'android':
          include "send_android_notifi.php";
          break;
        case 'ios':
          include "send_ios_notifi.php";
          break;
        case 'user':
          include "send_user_devices.php";
          break;
        case 'home':
        default:
          include "send_all_notif.php";
          break;
      }
    ?>

  </div>
</div>
<script src="script.js"></script>
</body>
</html>
