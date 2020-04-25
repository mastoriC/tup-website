<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>TUP School | Change Password</title>
    <link rel="icon" href="img/tup_logo_gradient.png">

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <script src="bootstrap/bootstrap.bundle.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <div class="container form-box col-5">
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
            $userPassword = $callUserData['u_password'];
            $userRole = $callUserData['u_role'];
            $userSubRole = $callUserData['u_subrole'];
            $studentGrade = $callUserData['sd_grade'];
            $studentRoom = $callUserData['sd_room'];
            $studentNo = $callUserData['sd_no'];
          }
        }
        $warningMsg = "";
        if(isset($_POST['changePasswordBtn'])) {
          if (!empty($_POST['oldPassword']) OR !empty($_POST['newPassword']) OR !empty($_POST['confirmPassword'])) {
            if ($userPassword == $_POST['oldPassword'] AND $_POST['newPassword'] == $_POST['confirmPassword']) {
              $newPassword = $_POST['newPassword'];
              mysqli_query($conn,"UPDATE usertable SET u_password = '$newPassword' WHERE u_id = '$userId'");
              header('Location: /PasswordChangeSuccessful.php');
              return;
            }
            if ($userPassword != $_POST['oldPassword']) {
              $warningMsg = "รหัสผ่านเก่าไม่ถูกต้อง";
            }
            if ($_POST['newPassword'] != $_POST['confirmPassword']) {
              $warningMsg = "รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบใหม่อีกครั้ง";
            }
          }
        }
      ?>
      <form method="post">
        <div class="form-title text-center">เปลี่ยนรหัสผ่าน</div>
        <!--Member ID-->
        <div class="row pb-4">
          <div class="col-4 text-right pt-2 item-header">
            รหัสผ่านเดิม
          </div>
          <div class="col-8 text-left">
            <input type="password" name="oldPassword" class="input-field col-8" placeholder="รหัสผ่านเดิม" required>
          </div>
        </div>
        <!--Password Field-->
        <div class="row pb-2">
          <div class="col-4 text-right pt-2 item-header">
            รหัสผ่านใหม่
          </div>
          <div class="col-8 text-left">
            <input type="password" name="newPassword" class="input-field col-8" placeholder="รหัสผ่านใหม่" required>
          </div>
        </div>
        <!--Password Confirm Field-->
        <div class="row">
          <div class="col-4 text-right pt-2 item-header">
            ยืนยันรหัสผ่านใหม่
          </div>
          <div class="col-8 text-left">
            <input type="password" name="confirmPassword" class="input-field col-8" placeholder="ยืนยันรหัสผ่านใหม่" required>
          </div>
        </div>
        <div class="warning-msg text-center pt-3">
          <?echo $warningMsg?>
        </div>
        <div class="text-center pt-3">
          <input type="submit" class="form-btn" name="changePasswordBtn" value="ยืนยัน">
        </div>
      </form>
    </div>
  </body>
</html>
