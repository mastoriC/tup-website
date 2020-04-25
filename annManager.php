<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>TUP School | Announcement Manager</title>
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
    <!--Checking Permission-->
    <?
      if($callUserData['u_subrole'] != "admin") {
        header('Location: /permission.php');
      }
    ?>

    <!--Body-->
    <div class="container-fluid bg-white">
      <div class="container body">
        <div class="row">
          <div class="col-9 text-left">

            <!--Announcement Header-->
            <div class="info-header">
              <div class="row pl-3 pr-3">
                <div class="col-6 bullet-left ">Announcement Manager</div>
              </div>
            </div>

            <!--Announcement Body-->
            <?
            if(isset($_POST['addAnnBtn'])) {
              $annTitle = $_POST['annTitle'];
              $annDetail = $_POST['annDetail'];
              $annImg = $_POST['annImg'];

              if($_POST['annType'] == 'ประชาสัมพันธ์') {
                $annType = "pr";
              }
              mysqli_query($conn,"INSERT INTO annlist(ann_title,ann_type,ann_detail,ann_img) VALUES('$annTitle','$annType','$annDetail','$annImg')");
              header('Location: /annManager.php');
              return;
            }
            ?>
            <form method="post">
              <div class="row info-body">
                <!--Title-->
                <div class="col-12 row pb-3">
                  <div class="col-2 pt-1 text-right">ชื่อหัวข้อ</div>
                  <div class="col-6">
                    <input type="text" class="input-round" name="annTitle" placeholder="หัวข้อข่าวประชาสัมพันธ์" required>
                  </div>
                  <div class="col-1 pt-1">ประเภท</div>
                  <div class="col-3">
                    <input list="annType" type="text" name="annType" class="input-round" placeholder="ประเภทข่าว" required>
                    <datalist id="annType">
                      <option value="ประชาสัมพันธ์">
                    </datalist>
                  </div>
                </div>
                <!--Detail-->
                <div class="col-12 row pb-3">
                  <div class="col-2 pt-2 text-right">รายละเอียด</div>
                  <div class="col-10">
                    <textarea class="input-box text-top" name="annDetail" rows="8" placeholder="รายละเอียดข่าวประชาสัมพันธ์ ..." required></textarea>
                  </div>
                </div>
                <!--IMG / Btn-->
                <div class="col-12 row pb-3">
                  <div class="col-2 pt-2 text-right">รูปภาพ</div>
                  <div class="col-4">
                    <input type="file" accept="image/*" class="input-img" name="annImg">
                  </div>
                  <div class="col-6 pt-1">
                    <div class="row">
                      <div class="col-12 text-right">
                        <input type="reset" class="web-btn" name="addAnnBtn" value="ยกเลิก">
                        <input type="submit" class="web-btn" name="addAnnBtn" value="เพิ่ม">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                <!--Table Header-->
                <div class="col-12 row pl-0 mt-4 pt-2 pb-2 font-14 table-header">
                  <div class="col-1 text-center">
                    No.
                  </div>
                  <div class="col-2 text-center">
                    IMG
                  </div>
                  <div class="col-4 text-center">
                    หัวข้อ
                  </div>
                  <div class="col-5 text-center">
                    รายละเอียด
                  </div>
                </div>
                <!--Table-->
                <?
                  $selectRow = mysqli_query($conn,"SELECT * FROM annlist");
                  while($annRow = mysqli_fetch_assoc($selectRow)) {
                ?>
                <div class="col-12 row font-14 pl-0 pt-3">
                  <div class="col-1 text-center">
                    <?echo $annRow['ann_id'];?>
                  </div>
                  <div class="col-2 text-center">
                    <?
                      if(!empty($annRow['ann_img'])) {
                    ?>
                      <img src="data:img;base64,<?echo base64_encode($annRow['ann_img'])?>" width="100%" height="auto">
                    <? } else { ?>
                      <img src="img/testbanner.png" width="100%" height="auto">
                    <? } ?>
                  </div>
                  <div class="col-4 text-left">
                    <?echo $annRow['ann_title'];?>
                  </div>
                  <div class="col-5 text-left item-detail">
                    <?echo $annRow['ann_detail'];?>
                  </div>
                </div>
                <? } ?>
              </div>
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
