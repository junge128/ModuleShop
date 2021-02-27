<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>下载与使用 &mdash; 模块化商店</title>
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
  <link rel="stylesheet" href="css/tutorial.css">
</head>

<?php
session_start();
if(isset($_SESSION["tuser"]))
{
  $user=$_SESSION["tuser"];
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
           <li class="active"><a class="nav-link" href=""><i class="fas fa-book"></i> <span>下载和教程</span></a></li>

           <li class="menu-header">我的</li>
           <li><a class="nav-link" href="/profile.php"><i class="fas fa-user"></i> <span>我的账号</span></a></li>
           <li><a class="nav-link" href="/code.php"><i class="fas fa-wallet"></i> <span>充值记录</span></a></li>
           <li><a class="nav-link" href="/invite.php"><i class="fas fa-laugh-squint"></i> <span>邀请注册</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         <div style="margin-left: 0;margin-right: 0" class="section-header">
          <h1>下载和使用</h1>
         </div>
         <div class="section-body">
          <div class="row mt-sm-4">
           <div class="col-lg-6">
            <div class="card card-hero" onclick="location='/tutorial-windows.php'">
             <div class="card-header os-card windows-card">
              <div class="card-icon">
               <i class="fab fa-windows"></i>
              </div>
              <h4>Windows</h4>
              <div class="card-description">
               适用于 Windows 7 或更高版本
              </div>
             </div>
            </div>
           </div>
           <div class="col-lg-6">
            <div class="card card-hero" onclick="location='tutorial-android.php'">
             <div class="card-header os-card android-card">
              <div class="card-icon">
               <i class="fab fa-android"></i>
              </div>
              <h4>Android</h4>
              <div class="card-description">
               适用于 Android 5.0 或更高版本
              </div>
             </div>
            </div>
           </div>
           <div class="col-lg-6">
            <div class="card card-hero" onclick="location='tutorial-ios.php'">
             <div class="card-header os-card ios-card">
              <div class="card-icon">
               <i class="fab fa-apple"></i>
              </div>
              <h4>Apple</h4>
              <div class="card-description">
               适用于 iOS 9 或更高版本
              </div>
             </div>
            </div>
           </div>
           <div class="col-lg-6">
            <div class="card card-hero" onclick="location='tutorial-mac.php'">
             <div class="card-header os-card mac-card">
              <div class="card-icon">
               <i class="fas fa-laptop"></i>
              </div>
              <h4>Mac</h4>
              <div class="card-description">
               适用于 macOS Sierra (10.12) 或更高版本
              </div>
             </div>
            </div>
           </div>
           <div class="col-lg-6">
            <div class="card card-hero" onclick="location='tutorial-linux.php'">
             <div class="card-header os-card linux-card">
              <div class="card-icon">
               <i class="fab fa-linux"></i>
              </div>
              <h4>Linux</h4>
              <div class="card-description">
               适用于……所有版本？
              </div>
             </div>
            </div>
           </div>
           <div class="col-lg-6">
            <div class="card card-hero">
             <div class="card-header os-card os-faq" style="box-shadow: 0 2px 6px #acb5f6;">
              <div class="card-icon">
               <i class="fas fa-surprise"></i>
              </div>
              <h4>FAQ</h4>
              <div class="card-description">
               常见问题解答
              </div>
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
  </html>
