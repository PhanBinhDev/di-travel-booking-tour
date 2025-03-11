<?php
require_once "./Views/layout/header.php";
?>

<main>
  <div class="news-main">

    <article class="news-hot">
      <?php foreach($arr_news1 as $value){?>
      <section class="hottest">

        <img src="./Views/image/<?= $value["main_img"]?>" alt="">
        <div class="content">
          <h3><a href="?route=newsdetail&id=<?= $value["news_id"]?>"><?= $value["title"]?></a></h3>
          <div class="list-inline">
            <ul>
              <li>Tác giả: <span class="author-name">Vtdiem</span></li>
              <li><?= $value["create_at"]?></li>
              <li><i class="fa-solid fa-chart-line"></i> views</li>
            </ul>
          </div>
        </div>
      </section>
      <!--end hottest news -->
      <? } ?>

      <section class="second-news">

        <?php foreach($arr_news2 as $value){?>
        <div class="second">
          <img src="./Views/image/<?= $value["main_img"]?>" alt="">
          <div class="second-content">
            <div class="category">
              <p><a href="?route=newsdetail&id=<?= $value["news_id"]?>"><?= $value["title"]?></a></p>
              <span>Tác giả: Vtdiem</span>
            </div>
          </div>
        </div>
        <? } ?>

      </section>
      <!--end second -->
    </article>
    <!--end hot news -->

    <div class="news-banner">
      <a href="?route=home"><img src="https://enews.monamedia.net/wp-content/uploads/2024/08/BANNER.jpg" alt=""></a>
    </div>

    <article class="care">
      <section class="care-left">

        <h2>Có Thể Bạn Quan Tâm</h2>

        <?php foreach($arr_news as $value){?>
        <div class="care-news">

          <img src="./Views/image/<?= $value["main_img"]?>" alt="">

          <div class="second-content">
            <h3><a href="?route=newsdetail&id=<?= $value["news_id"]?>"><?= $value["title"]?></a></h3>
            <p><?= $value["description"]?></p>
            <div class="list-inline">
              <ul>
                <li>Tác giả: <span class="author-name">Vtdiem</span></li>
                <li><?= $value["create_at"]?></li>
                <li><i class="fa-solid fa-chart-line"></i> views</li>
              </ul>
            </div>
            <div class="care-news-content">
            </div>
          </div>
        </div>
        <!--end care-news 1 -->
        <? } ?>

      </section>
      <!--end care-news left -->

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
    </article>
  </div>

</main>

<?php
require_once "./Views/layout/footer.php";
?>