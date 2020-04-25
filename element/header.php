<div class="container-fluid header">
  <div class="container pt-2 pb-2">
    <div class="row">
      <div class="col-4" onclick="location.href='index.php'">
          <button type="button" onclick="location.href='index.php'" class="school-title">
            <img src="img/tup_logo_gradient.png" height="36" width="auto">
            <span class="align-middle pl-1">โรงเรียนเตรียมอุดมศึกษาพัฒนาการ</span>
          </button>
      </div>
      <div class="col-8 text-right pt-1">
          <button type="button" class="mainmenu-btn" onclick="location.href='index.php'">หน้าหลัก</button>
          <button type="button" class="mainmenu-btn" onclick="location.href='announcement.php'">ประชาสัมพันธ์</button>
          <button type="button" class="mainmenu-btn" onclick="location.href='file/2018calendar.pdf'">ปฏิทินโรงเรียน</button>

        <?
          require 'connect.php';
          session_id("loginUser");
          session_start();
          error_reporting(~E_NOTICE);

          $userId = $_SESSION['loginId'];
          if(empty($userId)) {
        ?>
            <button type="button" class="user-btn" onclick="location.href='login.php'">เข้าสู่ระบบ</button>
        <? }
          $chkLoginUser = mysqli_query($conn,"SELECT * FROM usertable WHERE u_id = '$userId'");
          $resultChkLoginUser = mysqli_num_rows($chkLoginUser);
          if ($resultChkLoginUser == 1) {
            $callUserData = mysqli_fetch_array($chkLoginUser);
            if ($userId = $callUserData['u_id']) {
        ?>
                <button type="button" class="user-btn" onclick="location.href='profile.php'"><?echo $callUserData['u_prefix']." ".$callUserData['u_firstname']." ".$callUserData['u_lastname'];?></button>
                <button type="button" class="mainmenu-btn" onclick="location.href='logout.php'">
                  <img src="img/logout.svg" width="auto" height="18">
                </button>
        <? }} ?>
      </div>
    </div>
  </div>
</div>
