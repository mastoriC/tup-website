<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, shrink-to-fit=no">
    <title>TUP School | User Manager</title>
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
                <div class="col-6 bullet-left ">User Manager</div>
              </div>
            </div>

            <!--User Manager-->
            <?
            if(isset($_POST['addUserBtn'])) {
              $regUserId = $_POST['regUserId'];
              $regUserPassword = $_POST['regUserPassword'];
              $regUserPrefix = $_POST['regUserPrefix'];
              $regUserFirstname = $_POST['regUserFirstname'];
              $regUserLastname = $_POST['regUserLastname'];
              $regUserGender = $_POST['regUserGender'];
              $regUserRole = $_POST['regUserRole'];
              $regUserSubRole = $_POST['regUserSubRole'];
              $regSdGrade = $_POST['regStudentGrade'];
              $regSdRoom = $_POST['regStudentRoom'];

              $chkSameId = mysqli_query($conn,"SELECT u_id FROM usertable WHERE u_id = '$regUserId'");
              $resultSameId = mysqli_num_rows($chkSameId);
              if($resultSameId <= 0) {
                mysqli_query($conn,"INSERT INTO usertable(u_id , u_password , u_prefix , u_firstname , u_lastname , u_gender , u_role , u_subrole , sd_grade , sd_room)
                VALUES('$regUserId','$regUserPassword','$regUserPrefix','$regUserFirstname','$regUserLastname','$regUserGender','$regUserRole','$regUserSubRole','$regSdGrade','$regSdRoom')");
              } else {
                $warningMsg = "เลขประจำตัวดังกล่าวมีอยู่ในระบบ กรุณาตรวจสอบความถูกต้อง";
              }
              header('Location: /userManager.php');
              return;
            }
            ?>
            <form method="post">
              <div class="row pl-4 info-body">
                <div class="col-12">
                  <div class="row pl-3 pr-3">

                    <!--Line 01-->
                    <div class="col-12 pb-4">
                      <div class="row">
                        <div class="col-12 pb-2">
                          ID. / Password
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3">
                          <input type="text" maxlength="5" class="input-round" name="regUserId" placeholder="รหัสประจำตัว" required>
                        </div>
                        <div class="col-3">
                          <input type="password" class="input-round" name="regUserPassword" placeholder="รหัสผู้ใช้" required>
                        </div>
                      </div>
                    </div>
                    <!--Line 02-->
                    <div class="col-12 pb-3">
                      <div class="row">
                        <div class="col-12 pb-2">
                          User General Infomation
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2">
                          <input list="regUserPrefix" type="text" class="input-round" name="regUserPrefix" placeholder="คำนำหน้า" required>
                          <datalist id="regUserPrefix">
                            <option value="เด็กชาย">
                            <option value="เด็กหญิง">
                            <option value="นาย">
                            <option value="นางสาว">
                            <option value="นาง">
                          </datalist>
                        </div>
                        <div class="col-4">
                          <input type="text" class="input-round" name="regUserFirstname" placeholder="ชื่อจริง" required>
                        </div>
                        <div class="col-4">
                          <input type="text" class="input-round" name="regUserLastname" placeholder="นามสกุล" required>
                        </div>
                      </div>
                    </div>
                    <!--Line 03-->
                    <div class="col-12 pb-3">
                      <div class="row">
                        <div class="col-2">
                          <input list="regUserGender" type="text" class="input-round" name="regUserGender" placeholder="เพศ" required>
                          <datalist id="regUserGender">
                            <option value="ชาย">
                            <option value="หญิง">
                          </datalist>
                        </div>
                        <div class="col-3">
                          <input list="regUserRole" type="text" class="input-round" name="regUserRole" placeholder="สถานะผู้ใช้" required>
                          <datalist id="regUserRole">
                            <option value="นักเรียน">
                            <option value="อาจารย์">
                            <option value="ผู้อำนวยการ">
                          </datalist>
                        </div>
                        <div class="col-2">
                          <input list="regUserSubRole" type="text" class="input-round" name="regUserSubRole" placeholder="หน้าที่">
                          <datalist id="regUserSubRole">
                            <option value="admin">
                            <option value="sms">
                            <option value="pr">
                          </datalist>
                        </div>
                        <div class="col-2">
                          <input list="regStudentGrade" type="text" pattern="{1,6}" class="input-round" name="regStudentGrade" placeholder="ระดับชั้น">
                          <datalist id="regStudentGrade">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                            <option value="6">
                          </datalist>
                        </div>
                        <div class="col-2">
                          <input list="regStudentRoom" type="text" pattern="{1,18}" class="input-round" name="regStudentRoom" placeholder="ห้องเรียน">
                          <datalist id="regStudentRoom">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                            <option value="6">
                            <option value="7">
                            <option value="8">
                            <option value="9">
                            <option value="10">
                            <option value="11">
                            <option value="12">
                            <option value="13">
                            <option value="14">
                            <option value="15">
                            <option value="16">
                            <option value="17">
                            <option value="18">
                          </datalist>
                        </div>
                      </div>
                    </div>
                    <!--Add Btn-->
                    <div class="col-12 pb-2">
                      <div class="row">
                        <div class="col-12 text-right">
                          <input type="submit" class="web-btn" name="addUserBtn" value="เพิ่ม">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!--Warning Msg-->
                <div class="col-12">
                  <span class="warning-msg text-center"><?echo $warningMsg;?></span>
                </div>
                <!--Table Header-->
                <div class="col-12 row pl-0 mt-4 pt-2 pb-2 table-header font-14">
                  <div class="col-1 text-center">
                    No.
                  </div>
                  <div class="col-4 text-center">
                    Name
                  </div>
                  <div class="col-1 text-center">
                    Gender
                  </div>
                  <div class="col-2 text-center">
                    Role
                  </div>
                  <div class="col-1 text-center">
                    Grade
                  </div>
                  <div class="col-1 text-center">
                    Class
                  </div>
                  <div class="col-1 text-center">
                    Action
                  </div>
                </div>
                <!--Table-->
                <?
                  $selectRow = mysqli_query($conn,"SELECT * FROM usertable ORDER BY u_id AND u_role");
                  while($userRow = mysqli_fetch_assoc($selectRow)) {
                ?>
                <div class="col-12 row pl-0 pt-3 font-14">
                  <div class="col-1 text-center">
                    <?echo $userRow['u_id'];?>
                  </div>
                  <div class="col-4 text-left">
                    <?echo $userRow['u_prefix']." ".$userRow['u_firstname']." ".$userRow['u_lastname'];?>
                  </div>
                  <div class="col-1 text-center">
                    <?echo $userRow['u_gender'];?>
                  </div>
                  <div class="col-2 text-center">
                    <?echo $userRow['u_role'];?>
                  </div>
                  <div class="col-1 text-center">
                    <?echo $userRow['sd_grade'];?>
                  </div>
                  <div class="col-1 text-center">
                    <?echo $userRow['sd_room'];?>
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
