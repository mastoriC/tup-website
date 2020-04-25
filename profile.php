<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>TUP School | Profile</title>
    <link rel="icon" href="img/tup_logo_gradient.png">

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <script src="bootstrap/bootstrap.bundle.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>

    <?
      require 'connect.php';
      session_id("loginUser");
      session_start();

      $userId = $_SESSION['loginId'];

      $chkLoginUser = mysqli_query($conn,"SELECT * FROM usertable WHERE u_id = '$userId'");
      $resultChkLoginUser = mysqli_num_rows($chkLoginUser);
      if ($resultChkLoginUser == 1) {
        $callUserData = mysqli_fetch_array($chkLoginUser);
        if ($userId = $callUserData['u_id']) {
          $userPrefix = $callUserData['u_prefix'];
          $userFirstname = $callUserData['u_firstname'];
          $userLastname = $callUserData['u_lastname'];
          $userId = $callUserData['u_id'];
          $userRole = $callUserData['u_role'];
          $studentGrade = $callUserData['sd_grade'];
          $studentRoom = $callUserData['sd_room'];
          $studentNo = $callUserData['sd_no'];
          if($callUserData['u_subrole'] == 'admin') {
            $userSubRole = "ผู้ดูแลเว็บไซต์";
          }
        }
      }
    ?>

    <div class="container form-box col-5">
        <div class="form-title text-center">USER PROFILE</div>
        <!--Member ID-->
        <div class="row">
          <div class="col-4 text-right item-header">
            ชื่อ-สกุล
          </div>
          <div class="col-8 text-left">
            <?echo $userPrefix." ".$userFirstname." ".$userLastname;?>
          </div>
        </div>
        <!--Member Role-->
        <div class="row pt-3">
          <div class="col-4 text-right item-header">
            สถานะ
          </div>
          <div class="col-8 text-left">
            <?
              if(empty($callUserData['u_subrole'])) {
                echo $userRole;
              } else {
                echo $userRole." (".$userSubRole.")";
              }
            ?>
          </div>
        </div>
        <!--Member ID-->
        <div class="row pt-3">
          <div class="col-4 text-right item-header">
            รหัสประจำตัว
          </div>
          <div class="col-8 text-left">
            <?echo $userId;?>
          </div>
        </div>
        <!--Password-->
        <div class="row pt-3">
          <div class="col-4 text-right item-header">
            รหัสผ่าน
          </div>
          <div class="col-8 text-left">
            <form action="changePassword.php" method="post">
              <input type="submit" value="[เปลี่ยนรหัสผ่าน]" class="text-btn pl-0 pr-0">
            </form>
          </div>
        </div>


        <?
          if ($userRole == "นักเรียน") {
        ?>
        <!--Student Class-->
        <div class="row pt-3">
          <div class="col-4 text-right item-header">
            ระดับชั้น
          </div>
          <div class="col-8 text-left">
            <?echo "มัธยมศึกษาปีที่ ".$studentGrade." ห้อง ".$studentRoom;?>
          </div>
        </div>
        <!--Student Number In Class-->
        <div class="row pt-3">
          <div class="col-4 text-right item-header">
            เลขที่
          </div>
          <div class="col-8 text-left">
            <?echo $studentNo;?>
          </div>
        </div>
        <? } ?>

        <?
          if ($callUserData['u_subrole'] == "admin") {
        ?>
        <div class="text-left pt-5">
          <div class="panel-header">คำสั่งผู้ดูแลระบบ</div>
        </div>
        <div class="pt-3 text-left">
          <form action="userManager.php" class="list-inline-item" method="post">
            <input type="submit" value="Account Manager" name="accountBtn" class="admin-btn">
          </form>
          <form action="annManager.php" class="list-inline-item" method="post">
            <input type="submit" value="Annoucement Manager" name="announcementBtn" class="admin-btn">
          </form>
        </div>
        <? } ?>

        <div class="text-left pt-4">
          <div class="panel-header">การจัดการภายในห้องเรียน</div>
        </div>
        <div class="pt-3 text-left">
          <form action="file/Classroom-Timetable/<?echo $studentGrade."r".$studentRoom.".pdf";?>" target="_blank" class="list-inline-item" method="post">
            <input type="submit" value="ตารางการสอน" name="TimetableBtn" class="form-btn">
          </form>
          <form action="classMember.php" class="list-inline-item" method="post">
            <input type="submit" value="รายชื่อสมาชิก" name="classMemberListBtn" class="form-btn">
          </form>
          <form action="AbsentReport.php" class="list-inline-item" method="post">
            <input type="submit" value="บันทึกการขาดเรียน" name="absentReportBtn" class="form-btn">
          </form>
        </div>

        <div class="text-left pt-4">
          <div class="panel-header">รายงานผลการเรียนและพฤติกรรม</div>
        </div>
        <div class="pt-3 text-left">
          <form action="StudentGradeReport.php" class="list-inline-item" method="post">
            <input type="submit" value="ผลการเรียน" name="sdGradeBtn" class="form-btn">
          </form>
          <form action="StudentBehaviorScoreReport.php" class="list-inline-item" method="post">
            <input type="submit" value="คะแนนพฤติกรรม / 0 / ร / มส" name="sdBeScoreBtn" class="form-btn">
          </form>
        </div>
    </div>
  </body>
</html>
