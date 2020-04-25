<div class="col-3 ml-0 text-center">
  <!--School Director-->
  <div class="row sd-bar pb-3 pt-4">
    <div class="row">
      <div class="col-12 text-center">
        <img src="img/school_director.png" width="60%" height="auto">
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-12 text-center sd-name">
        นายประสงค์ สุบรรณพงษ์
      </div>
      <div class="col-12 text-center sd-role">
        ผู้อำนวยการโรงเรียน
      </div>
    </div>
  </div>
  <div class="row">
    <button class="col-12 sd-btn pb-2 pt-2">
      พบผู้อำนวยการ
    </button>
  </div>

  <!--Body Box-->
  <div class="row sidebar mt-3 pb-3 pt-3">
    <div class="col-12">
      <div class="row pl-3 pr-3">
        <div class="col-12 sidebar-title text-center">
          ประกาศ
        </div>
      </div>
    </div>
    <?
      $callAlert = mysqli_query($conn,"SELECT * FROM alertlist ORDER BY al_date DESC LIMIT 8");
      while ($alertData = mysqli_fetch_assoc($callAlert)) {
        $alDate = date_create($alertData['al_date']);
        $currentTime = date("Y-m-d");
        $alertMsg = "";
        if ($currentTime == $alertData['al_date']) {
          $alertMsg = "NEW!";
        }
    ?>
    <div class="row pt-3 pl-3 pr-3 pb-1">
      <div class="col-12 text-left sb-text">
        <div class="sb-title">
          <span class="sb-alert"><?echo $alertMsg?></span>
          <?echo DATE_FORMAT($alDate , "d M Y")?>
        </div>
        <div><?echo $alertData['al_detail']?></div>
      </div>
    </div>
  <? } ?>
  </div>

  <!--กลุ่มงาน-->
  <div class="row sidebar mt-3 pb-3 pt-3">
    <div class="col-12">
      <div class="row pl-3 pr-3">
        <div class="col-12 sidebar-title">
          กลุ่มงานโรงเรียน
        </div>
      </div>
    </div>
    <div class="col-12 text-left mt-2">
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">กลุ่มงานบริหารงบประมาณ</li>
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">กลุ่มงานควบคุมภายใน</li>
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">กลุ่มงานนโยบายและแผน</li>
    </div>
  </div>

  <!--Side Bar Link-->
  <div class="row sidebar mt-3 pb-3 pt-3">
    <div class="col-12">
      <div class="row pl-3 pr-3">
        <div class="col-12 sidebar-title">
          แหล่งการเรียนรู้
        </div>
      </div>
    </div>
    <div class="col-12 text-left mt-2">
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">OCOP</li>
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">แหล่งการเรียนรู้</li>
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">English Program</li>
      <li class="sb-btn-box col-12 pt-2 pb-2 mt-2 mb-2">DLIT</li>
    </div>
  </div>
</div>
