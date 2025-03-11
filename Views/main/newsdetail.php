<?php
require_once "./Views/layout/header.php";
?>

<main>
  <div class="news-detail">

    <div class="main-content">
      <h1 class="news-title"><?= $detail["title"]?></h1>
      <div class="news-date"><?= $detail["create_at"]?></div>
      <p><?= $detail["description"]?></p>

      <div class="news-content">
        <img src="./Views/image/<?= $detail["image1"]?>" class="news-image">
        <p class="news-paragraph"><?= $detail["content"]?> </p>

        <img src="./Views/image/<?= $detail["image2"]?>" class="news-image">
        <p class="news-paragraph"><?= $detail["content2"]?> </p>

        <img src="./Views/image/<?= $detail["image3"]?>" class="news-image">
        <p class="news-paragraph"> <?= $detail["content3"]?> </p>

      </div>
    </div>


    <section class="care-right">
      <img src="https://enews.monamedia.net/wp-content/uploads/2024/08/26261010_7183916-scaled.jpg" alt="">
      <h3>Tin mới gần đây</h3>
      <hr>

      <?php foreach($arr_news as $value){?>
      <div class="care-right-news">
        <img src="./Views/image/<?= $value["main_img"]?>" alt="">
        <div class="right-news-content">
          <h4><a href="?route=newsdetail&id=<?= $value["news_id"]?>"><?= $value["title"]?></a></h4>
          <p>Tác giả: <span class="author-name">Vtdiem</span></p>
        </div>
      </div>
      <?php } ?>

    </section>

  </div>
</main>


<?php
require_once "./Views/layout/footer.php";
?>