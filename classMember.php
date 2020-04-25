<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>TUP School | Class Member</title>
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

            <!--Announcement Header-->
            <div class="info-header">
              <div class="row pl-3 pr-3">
                <div class="col-6 bullet-left">
                  <?echo "รายชื่อสมาชิกห้อง ม.". $callUserData['sd_grade']."/".$callUserData['sd_room']?>
                </div>
              </div>
            </div>

            <form method="post">
              <div class="row pl-4 info-body">

                <!--Table Header-->
                <div class="col-12 row pl-0 pt-2 pb-2 table-header">
                  <div class="col-1 text-center">
                    เลขที่
                  </div>
                  <div class="col-2 text-center">
                    เลขประจำตัว
                  </div>
                  <div class="col-4 text-center">
                    ชื่อ-สกุล
                  </div>
                  <div class="col-1 text-center">
                    ขาด
                  </div>
                  <div class="col-3 text-center">
                    หมายเหตุ
                  </div>
                  <div class="col-1 text-center">
                    Action
                  </div>
                </div>
                <!--Table-->
                <?
                  $userGrade = $callUserData['sd_grade'];
                  $userRoom = $callUserData['sd_room'];
                  $selectRow = mysqli_query($conn,"SELECT * FROM usertable WHERE sd_grade = '$userGrade' AND sd_room = '$userRoom' ORDER BY sd_no");
                  while($userRow = mysqli_fetch_assoc($selectRow)) {
                ?>
                <div class="col-12 row pl-0 pt-3">
                  <div class="col-1 text-center">
                    <?echo $userRow['sd_no'];?>
                  </div>
                  <div class="col-2 text-center">
                    <?echo $userRow['u_id'];?>
                  </div>
                  <div class="col-4 text-left">
                    <?echo $userRow['u_prefix']." ".$userRow['u_firstname']." ".$userRow['u_lastname'];?>
                  </div>
                  <div class="col-1 text-center">

                  </div>
                  <div class="col-3 text-left">

                  </div>
                  <div class="col-1 text-center">

                  </div>
                </div>
                <? } ?>
              </div>
            </form>
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
