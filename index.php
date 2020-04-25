<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>โรงเรียนเตรียมอุดมศึกษาพัฒนาการ</title>
    <link rel="icon" href="img/tup_logo_gradient.png">

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <script src="bootstrap/bootstrap.bundle.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/main.css">

  </head>
  <body>

    <!--Header-->
    <?include 'element/header.php'?>

    <!--Body-->
    <div class="container-fluid bg-white">
      <div class="container body">
        <div class="row">
          <div class="col-9 text-left">

            <!--Announcement Banner 16:9 -->
            <div class="row">
              <div class="col-12 pb-4">
                <img src="img/schoolbanner.png" width="100%" height="auto" class="web-banner">
              </div>
            </div>

            <!--Announcement Header-->
            <div class="info-header">
              <div class="row pl-3 pr-3">
                <div class="col-6 bullet-left ">ประชาสัมพันธ์</div>
                <div class="col-6 text-right pr-0">
                  <?
                    if($callUserData['u_subrole'] == "admin") {
                  ?>
                  <button type="button" class="web-btn-sec admin" onclick="location.href='annManager.php'">จัดการ</button>
                  <? } ?>
                  <button type="button" class="web-btn-sec">ทั้งหมด</button>
                </div>
              </div>
            </div>
            </header>

            <!--Announcement Body-->
            <?
              $selectRow = mysqli_query($conn,"SELECT * FROM annlist WHERE ann_type = 'PR' ORDER BY ann_id DESC LIMIT 5");
              while ($annRow = mysqli_fetch_assoc($selectRow)) {
                if(isset($_POST['annDelConfirmBtn'.$annRow['ann_id']])) {
                  $annId = $annRow['ann_id'];
                  mysqli_query($conn,"DELETE FROM annlist WHERE ann_id = '$annId'");
                  header('location: /index.php');
                  return;
                }
            ?>
            <div class="info-body row">
              <div class="col-4">
                <? if(empty($annRow['ann_img'])) { ?>
                  <img src="img/testbanner.png" width="100%" height="auto" class="item-banner">
                <? } else { ?>
                  <img src="data:img;base64,<?echo base64_encode($annRow['ann_img'])?>" width="100%" height="auto" class="item-banner">
                <? } ?>
              </div>
              <div class="col-8">
                <div class="item-title">
                  <?echo $annRow['ann_title'];?>
                </div>
                <div class="item-detail">
                  <?echo $annRow['ann_detail'];?>
                </div>

                <?
                  if($callUserData['u_subrole'] == "admin") {
                ?>
                    <form method="post" class="pt-1">
                    <?
                      if(isset($_POST['annDelBtn'.$annRow['ann_id']])) {
                    ?>
                        <input type="submit" class="web-btn-sec admin" name="<?echo "annDelConfirmBtn".$annRow['ann_id']?>" value="ยืนยัน">
                        <input type="submit" class="web-btn-sec admin" name="<?echo "annDelCancelBtn".$annRow['ann_id']?>" value="ยกเลิก">
                        <?
                          if(isset($_POST['annDelCancelBtn'.$annRow['ann_id']])) {
                        ?>
                          <input type="submit" class="web-btn-sec admin" name="<?echo "annEditBtn".$annRow['ann_id']?>" value="แก้ไข">
                          <input type="submit" class="web-btn-sec admin" name="<?echo "annDelBtn".$annRow['ann_id']?>" value="ลบ">
                        <? } ?>
                    <? } else { ?>
                        <input type="submit" class="web-btn-sec admin" name="<?echo "annEditBtn".$annRow['ann_id']?>" value="แก้ไข">
                        <input type="submit" class="web-btn-sec admin" name="<?echo "annDelBtn".$annRow['ann_id']?>" value="ลบ">
                    <? } ?>
                    </form>
                <? } ?>
              </div>
            </div>
            <? } ?>

          <!--Event Header-->
            <div class="info-header pt-5">
              <div class="row pl-3 pr-3">
                <div class="col-6 bullet-left ">กิจกรรมโรงเรียน</div>
                <div class="col-6 text-right pr-0">
                  <?
                    if($callUserData['u_subrole'] == "admin") {
                  ?>
                  <button type="button" class="web-btn-sec admin">จัดการ</button>
                  <? } ?>
                  <button type="button" class="web-btn-sec">ทั้งหมด</button>
                </div>
              </div>
            </div>

          <!--Event Body-->
          <?
            $selectRow = mysqli_query($conn,"SELECT * FROM annlist WHERE ann_type = 'Event' ORDER BY ann_id DESC LIMIT 5");
            while ($annRow = mysqli_fetch_assoc($selectRow)) {
          ?>
          <div class="info-body row">
            <div class="col-4">
              <img src="img/<?echo $annRow['ann_img'];?>" width="100%" height="auto" class="item-banner">
            </div>
            <div class="col-8">
              <div class="item-title">
                <?echo $annRow['ann_title'];?>
                <button type="button" class="web-btn-sec admin">แก้ไข</button>
              </div>
              <div class="item-detail">
                <?echo $annRow['ann_detail'];?>
              </div>
            </div>
          </div>
          <? } ?>

        </div>

          <!--Sidebar-->
          <?include 'element/sidebar.php'?>
        </div>
      </div>
    </div>


    <!--Footer-->
    <?include 'element/footer.php'?>
  </body>
</html>
