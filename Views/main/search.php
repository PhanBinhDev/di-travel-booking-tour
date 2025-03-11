<?php
require_once "./Views/layout/header.php";

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 sidebar">
      <div class="region-menu">
        <h3>Chọn Vùng Miền</h3>
        <ul>
          <li>
            <a href="?route=alltour&region=Miền+Bắc">
              <i class="fa-solid fa-mountain"></i> Miền Bắc
            </a>
          </li>
          <li>
            <a href="?route=alltour&region=Miền+Trung">
              <i class="fa-solid fa-umbrella-beach"></i> Miền Trung
            </a>
          </li>
          <li>
            <a href="?route=alltour&region=Miền+Nam">
              <i class="fa-solid fa-city"></i> Miền Nam
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">

      <h3>Hiển thị kết quả tìm kiếm cho: <span
          style="font-weight: 500;"><?php if (isset($_GET["search_input"]))echo $_GET["search_input"]?></span>
        <?php if (!empty($arr_search)){ ?>
        <div class="hottest-tour-place">
          <?php foreach ($arr_search as $value){ ?>
          <div class="tour search-tour" style="width: 300px; height:450px;">
            <img src="./Views/image/<?= $value["image"]?>" alt="">
            <h3><?= $value["tour_name"]?></h3>
            <div class="infor">
              <span> <i class="fa-solid fa-location-dot"></i> <?= $value["location"]?></span>
              <span> <i class="fa-regular fa-calendar-days"></i> <?= $value["duration"]?></span>
            </div>
            <p><i class="fa-solid fa-money-check-dollar"></i> <?= number_format($value["price"], 0, ',', '.')?>đ</p>
            <button><a style="text-decoration: none;color:white;font-size:medium"
                href="?route=tourdetail&id=<?= $value["id"]?>">Xem ngay</a></button>
          </div>
          <?php } ?>

        </div>
        <?php } else{ ?>
        <p style="margin: 100px 0; text-align:center; font-size:larger">Không tìm thấy tour phù hợp.</p>
        <?php } ?>
    </div>
  </div>
</div>


<?php
require_once "./Views/layout/footer.php";

?>