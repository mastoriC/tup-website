<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>TUP School | Login</title>
    <link rel="icon" href="img/tup_logo_gradient.png">

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <script src="bootstrap/bootstrap.bundle.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <form method="post">
      <div class="container form-box col-5 shadow">
        <div class="form-title text-center">เข้าสู่ระบบ</div>
        <?php
          require 'connect.php';
          session_id("loginUser");
          session_start();
          $warningMsg = "";

          if(isset($_POST['loginBtn'])) {
            $loginId = $_POST['inputId'];
            $loginPassword = $_POST['inputPassword'];
            $chkUser = mysqli_query($conn,"SELECT * FROM usertable WHERE u_id = '$loginId' AND u_password = '$loginPassword'");
            $resultChkUser = mysqli_num_rows($chkUser);
            if($resultChkUser <= 0) {
              $warningMsg = "รหัสประจำตัว หรือ รหัสผ่าน ไม่ถูกต้อง";
            } else {
              $userData = mysqli_fetch_array($chkUser);
              if($loginId = $userData['u_id'] AND $loginPassword = $userData['u_password']) {
                $_SESSION['loginId'] = $loginId;
                header('Location: /index.php');
                return;
              } else {
                $warningMsg = "รหัสประจำตัว หรือ รหัสผ่าน ไม่ถูกต้อง";
              }
            }
          }
        ?>
        <!--Member ID-->
        <div class="row pb-3">
          <div class="col-4 text-right pt-2 item-header">
            รหัสประจำตัว
          </div>
          <div class="col-8 text-left">
            <input type="text" maxlength="5" name="inputId" class="input-field col-8" placeholder="รหัสประจำตัว 5 หลัก" required>
          </div>
        </div>
        <!--Password Field-->
        <div class="row">
          <div class="col-4 text-right pt-2 item-header">
            รหัสผ่าน
          </div>
          <div class="col-8 text-left">
            <input type="password" name="inputPassword" class="input-field col-8" placeholder="รหัสผ่าน" required>
          </div>
        </div>
        <div class="warning-msg text-center pt-3">
          <?echo $warningMsg ?>
        </div>
        <div class="text-center pt-3">
          <input type="submit" class="form-btn" name="loginBtn" value="ยืนยัน">
        </div>
      </div>
    </form>
  </body>
</html>
