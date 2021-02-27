<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>我的账号 &mdash; 模块化商店</title>
	<link rel="icon" href="image\icon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="image\icon.ico" type="image/x-icon"/>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="css/profile.css">
</head>

<?php
session_start();
if(isset($_SESSION["tuser"]))
{
  $user=$_SESSION["tuser"];
  $email=$_SESSION["email"];
}
else
{
    echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."/index.html"."\""."</script>";
		exit;
}
?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?php echo $_SESSION["user_img"]?>" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $user?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile.php" class="dropdown-item has-icon">
                <i class="fas fa-user"></i> 我的账号
              </a>
              <a href="invite.php" class="dropdown-item has-icon">
                <i class="fas fa-laugh-squint"></i> 邀请注册
              </a>
              <div class="dropdown-divider"></div>
              <a href="/php/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> 退出登录
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">

          <span><img alt="image" style="width: 25px" src="/image/icon.svg" class="mr-2"></span>
          <a href="index.html">模块化商店</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <span><img alt="image" style="width: 25px" src="/image/icon.svg"></span>
          </div>
          <ul class="sidebar-menu">
           <li><a class="nav-link" href="/user.php"><i class="fab fa-fort-awesome"></i> <span>首页</span></a></li>
           <li><a class="nav-link" href="/shop.php"><i class="fas fa-store"></i> <span>购买开通</span></a></li>
           <li class="menu-header">使用</li>
           <li><a class="nav-link" href="/node.php"><i class="fas fa-server"></i> <span>节点列表</span></a></li>
           <li><a class="nav-link" href="/tutorial.php"><i class="fas fa-book"></i> <span>下载和教程</span></a></li>

           <li class="menu-header">我的</li>
           <li class="active"><a class="nav-link" href="/profile.php"><i class="fas fa-user"></i> <span>我的账号</span></a></li>
           <li><a class="nav-link" href="/code.php"><i class="fas fa-wallet"></i> <span>充值记录</span></a></li>
           <li><a class="nav-link" href="/invite.php"><i class="fas fa-laugh-squint"></i> <span>邀请注册</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
           <div style="margin-left: 0;margin-right: 0" class="section-header">
            <h1>我的账号</h1>
           </div>
           <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $user?>!</h2>
            <p class="section-lead"> <a><?php echo $email?></a> </p>
            <div class="row mt-sm-4">
             <div class="col-lg-6">
              <div class="card card-large-icons">
               <div class="card-icon bg-primary text-white">
                <i class="fas fa-lock"></i>
               </div>
               <div class="card-body">
                <h4>修改密码</h4>
                <p>定期修改为高强度密码以保护您的账号</p>
                <a href="##" class="card-cta" data-toggle="modal" data-target="#change-password-modal">立即修改 <i class="fas fa-chevron-right"></i></a>
               </div>
              </div>
             </div>
            </div>
           </div>
          </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> 模块化商店</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>


    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
    function passwordConfirm() {
      if($("#pwd").val() != $("#repwd").val()){
          swal("提示", "您两次输入的密码不一致", "error");
      }else{
        $("#btn").addClass("btn-progress");
        $.ajax({
            type : "POST",
            url : "php/re_pw.php",
            data: {
                  username: '<?php echo $user?>',
                  oldpwd: $("#oldpwd").val(),
                  pwd: $("#pwd").val()
            },
            success : function(result) {
                $("#btn").removeClass("btn-progress");
                swal("提示", "成功修改新密码", "success")
                .then((value) => {
                  window.location = '/profile.php';
                });
            },
            error : function(e){
                $("#btn").removeClass("btn-progress");
                var status = e.status;
                if (status == 406) {
                  swal("提示", "您输入的原密码有误", "error");
                }else{
                  swal("提示", "发生未知错误", "error");
                }
            }
        });
      }
    }

    </script>

    <div class="modal fade" tabindex="-1" role="dialog" id="change-password-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">修改账号密码</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>原密码</label>
                <input id="oldpwd" type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>新密码</label>
                <input id="pwd" type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>再次输入新密码</label>
                <input id="repwd" type="password" class="form-control">
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button id='btn' type="button" class="btn btn-primary" onclick="passwordConfirm()">确定</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          </div>
        </div>
      </div>
    </div>

  </body>
  </html>
