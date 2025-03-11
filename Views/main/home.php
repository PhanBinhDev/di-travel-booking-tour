<?php
require_once "./Views/layout/header.php";

?>

<main>
  <div class="banner">
    <video autoplay muted loop>
      <source
        src="https://storage.googleapis.com/teko-gae.appspot.com/media/video/2023/11/19/22451432-c310-4081-858c-cfb57570e249/6487d1c5c3473ff5e5376abd_camelia-transcode.webm">
    </video>
    <div class="about-us">
      <h1>DI TRAVEL</h1>
      <h3>CHUYÊN TỔ CHỨC CÁC TOUR DU LỊCH TRONG NƯỚC</h3>
      <p>Tại DiTravel, chúng tôi không chỉ đơn thuần là một công ty du lịch. Chúng tôi là những người bạn đồng hành,
        cùng bạn viết nên những câu chuyện riêng. Chúng tôi cam kết mang đến cho bạn những trải nghiệm du lịch độc đáo,
        những dịch vụ chất lượng và những thông tin hữu ích để bạn có thể lên kế hoạch cho chuyến đi hoàn hảo.</p>
    </div>
  </div>
  <div class="search">
    <h2>Tìm tour</h2>
    <form action="" method="get">
      <input type="text" name="search_input" placeholder="Nhập địa điểm ở đây...">
      <button type="submit" name="route" value="search">Tìm kiếm</button>

    </form>
  </div>
  <div class="hottest-tour">
    <div class="hottest-tour-title">
      <h2>CÁC TOUR HẤP DẪN NHẤT 2024</h2>
      <p>Khám phá Việt Nam tươi đẹp với hàng ngàn hành trình độc đáo! Từ những bãi biển cát trắng trải dài miền Trung,
        đến những cánh rừng xanh ngát Tây Nguyên, hay những con phố cổ kính Hà Nội, chúng tôi đều có tour phù hợp với
        bạn. Hãy cùng chúng tôi hòa mình vào văn hóa bản địa, thưởng thức ẩm thực đặc sắc và tạo nên những kỷ niệm khó
        quên.</p>
    </div>

    <div class="hottest-tour-place">
      <?php foreach($arr as $value){ ?>
      <div class="tour" style="width: 317px; height:500px;">
        <a href="?route=tourdetail&id=<?= $value["id"]?>"><img src="./Views/image/<?= $value["image"]?>" alt=""></a>
        <h3><?= $value["tour_name"]?></h3>
        <div class="infor">
          <span> <i class="fa-solid fa-location-dot"></i> <?= $value["location"]?></span>
          <span> <i class="fa-regular fa-calendar-days"></i> <?= $value["duration"]?></span>
        </div>
        <p><i class="fa-solid fa-money-check-dollar"></i> <?= number_format($value["price"], 0, ',', '.')?>đ</p>
        <button><a style="text-decoration: none;color:white;font-size:medium"
            href="?route=tourdetail&id=<?= $value["id"]?>">Xem ngay</a></button>
      </div>
      <?php }?>

    </div>
  </div>

  <div class="sale">
    <img src="./Views/image/phuquoc.jpg" alt="">
    <div class="content">
      <p>Giảm giá 30%</p>
      <h3>Nghỉ dưỡng tại Phú Quốc</h3>
      <!-- <button>Xem ngay</button> -->
    </div>
  </div>

  <div class="famous-place-title">
    <h2>Địa điểm thu hút khách</h2>
    <p>Việt Nam, đất nước hình chữ S với những vùng miền khác nhau, mỗi nơi đều mang một vẻ đẹp riêng biệt. Từ những phố
      cổ trầm mặc, những cánh đồng hoa rực rỡ đến những đỉnh núi cao ngất, Việt Nam sẽ khiến bạn phải bất ngờ trước sự
      đa dạng và phong phú của mình. Hãy cùng chúng tôi khám phá những điều kỳ diệu của đất nước và tạo nên những kỷ
      niệm khó quên.</p>
  </div>

  </div>


  <div class="famous-place">
    <?php foreach($arr_famous as $value) {?>
    <div class="place">
      <a href="?route=tourdetail&id=<?= $value["id"]?>"><img src="./Views/image/<?= $value["image"]?>" alt=""></a>
      <div class="content">
        <h3><a style="text-decoration: none;color:white;"
            href="?route=tourdetail&id=<?= $value["id"]?>"><?= $value["tour_name"]?></a></h3>
        <p><?= $value["description"]?></p>
        <button><a style="text-decoration: none;color:white;" href="?route=tourdetail&id=<?= $value["id"]?>">Xem
            ngay</a></button>
      </div>
    </div>
    <?php } ?>

  </div>
  <div class="vungmien">
    <h2>Du lịch theo vùng miền</h2>
  </div>

  <div class="city-map">
    <div class="city-map-line">
      <div class="city">
        <?php foreach($arr_bac as $value) {?>
        <div class="city-tour">
          <a href="?route=tourdetail&id=<?= $value["id"]?>"><img src="./Views/image/<?= $value["image"]?>" alt=""></a>
          <div class="city-content">
            <h3><a style="text-decoration: none;color:white;"
                href="?route=tourdetail&id=<?= $value["id"]?>"><?= $value["tour_name"]?></a></h3>
            <p><?= number_format($value["price"], 0, ',', '.')?> đ</p>
            <button><a style="text-decoration: none;color:white;" href="?route=tourdetail&id=<?= $value["id"]?>">Xem
                ngay</a></button>
          </div>
        </div>
        <?php } ?>


      </div>

      <div class="map">
        <a href="?route=alltour&region=Miền+Bắc"><img src="./Views/image/mienbac.jpg" alt=""></a>
        <div class="city-in-map">
          <h3><a style="text-decoration: none;color:black;" href="?route=alltour&region=Miền+Bắc">Miền Bắc</a></h3>
          <p>Với vẻ đẹp hùng vĩ của núi rừng, văn hóa đa dạng với nhiều dân tộc thiểu số sinh sống, ẩm thực phong phú
            đậm đà hương vị và khí hậu bốn mùa rõ rệt là những yếu tố thu hút du khách đến với miền Bắc.</p>
          <ul>
            <li>Hà Nội</li>
            <li>Hà Giang</li>
            <li>Lào Cai</li>
            <li>Hải Phòng</li>
            <li>Quảng Ninh</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="city-map-line">
      <div class="map">
        <a href="?route=alltour&region=Miền+Nam"><img src="./Views/image/miennam.jpg" alt=""></a>
        <div class="city-in-map">
          <h3><a style="text-decoration: none;color:black;" href="?route=alltour&region=Miền+Nam">Miền Nam</a></h3>
          <p>Với sông nước mênh mông và khí hậu nhiệt đới, hệ thống sông ngòi chằng chịt, những cánh đồng lúa xanh mướt,
            những rừng tràm ngập mặn đã tạo nên một bức tranh thiên nhiên tươi đẹp của miền Nam.</p>
          <ul>
            <li>Hồ Chí Minh</li>
            <li>Đà Nẵng</li>
            <li>Đồng Nai</li>
            <li>Tây Ninh</li>
            <li>Cần Thơ</li>
          </ul>
        </div>
      </div>

      <div class="city">
        <?php foreach($arr_nam as $value) {?>
        <div class="city-tour">
          <a href="?route=tourdetail&id=<?= $value["id"]?>"><img src="./Views/image/<?= $value["image"]?>" alt=""></a>
          <div class="city-content">
            <h3><a style="text-decoration: none;color:white;"
                href="?route=tourdetail&id=<?= $value["id"]?>"><?= $value["tour_name"]?></a></h3>
            <p><?= number_format($value["price"], 0, ',', '.')?> đ</p>
            <button><a style="text-decoration: none;color:white;" href="?route=tourdetail&id=<?= $value["id"]?>">Xem
                ngay</a></button>
          </div>
        </div>
        <?php } ?>

      </div>

    </div>
  </div>


</main>

<?php
require_once "./Views/layout/footer.php";
?>