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
      <?php 
            $filteredTours = [];
            
            if (!empty($region)) {
                $filteredTours = array_filter($alltour, function($tour) use ($region) {
                    return $tour['region'] == $region;
                });
            } else {
                $filteredTours = $alltour;
            }
            
            if (!empty($filteredTours)) {
                foreach($filteredTours as $value){ 
        ?>
      <div class="tour" style="width: 300px; height:450px;">
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
      <?php 
                } 
            } else {
                echo "<p>Không có tour nào trong khu vực này.</p>";
            }
        ?>
    </div>
  </div>
</div>
<?php
require_once "./Views/layout/footer.php";
?>