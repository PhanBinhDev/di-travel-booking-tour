<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./Views/css/index.css">
  <link rel="stylesheet" href="./Views/css/news.css">
  <link rel="stylesheet" href="./Views/css/admin.css">
  <link rel="stylesheet" href="./Views/css/newsdetail.css">
  <link rel="stylesheet" href="./Views/css/tourdetail.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>
  <nav>
    <img src="./Views/image/logo2.png" alt="">
    <ul>
      <li><a href="index.php?route=home">Trang chủ</a></li>
      <li><a href="index.php?route=gt">Giới thiệu</a></li>
      <li><a href="?route=alltour">Tour trong nước</a></li>
      <li><a href="index.php?route=news">Tin tức</a></li>
      <li><a href="index.php?route=lh">Liên hệ</a></li>
    </ul>
    <div>
      <?php if(!isset($_SESSION["username"])){ ?>
      <a href="?route=login"><i id="signin_icon" class="fa-solid fa-user"></i></a>
      <?php } ?>

      <?php if(isset($_SESSION["username"])){ ?>
      <a href='index.php?route=<?=$_SESSION["role"]?>&id=<?=$_SESSION["user_id"]?>'><i id="signin_icon"
          class="fa-solid fa-user"></i></a>
      <a href="index.php?route=logout">
        <i class="fa-solid fa-right-from-bracket"></i>
      </a>
      <?php } ?>

    </div>
  </nav>