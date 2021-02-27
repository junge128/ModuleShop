<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>IOS 使用教程 &mdash; 模块化商店</title>
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
  <link rel="stylesheet" href="assets/modules/chocolat/dist/css/chocolat.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="css/tutorial-detail.css">
</head>

<?php
session_start();
if(isset($_SESSION["tuser"]))
{
  $user=$_SESSION["tuser"];
  $isvip = $_COOKIE["IsCopy"];
  $appleid = '';
  if($isvip == 'true'){
      $appleid = ' 账号: ceshi4d@outlook.com 密码: Qingning5783 <br><br>提示开启双重验证的时候，请一定一定不要点开启';
  }
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
           <li class="active"><a class="nav-link" href="tutorial.php"><i class="fas fa-book"></i> <span>下载和教程</span></a></li>

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
          <div class="section-header-back">
           <a href="/tutorial.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1>IOS 使用教程</h1>
         </div>
         <div class="section-body">
          <div class="row mt-sm-4">
           <div class="col-12">
            <div class="card">
             <div class="card-body">
              <ul class="steps">
               <li>
                <div class="row">
                 <div class="left-text col-xs-12 col-md-6 col-lg-6">
                  <label class="step-no">1.</label>
                  <p>在 设置 -> App Store 登录本站提供的美区 Apple ID。</p>
                  <p>然后在AppStore搜索：Shadowrocket 下载，请勿下错，如图</p>
                  <i id='appleid' class="fas fa-eye-slash"> 本站共享Apple ID，购买线路后即可看到</i><br><br>
                  <a href="https://apps.apple.com/us/app/shadowrocket/id932747118" class="btn btn-icon icon-left btn-primary btn-app btn-lg btn-round" target="blank"><i class="fab fa-apple"></i> 打开 App Store 下载</a>
                  <a data-toggle="modal" data-target="#legacy-modal-1" style="color:white" class="btn btn-icon icon-left btn-primary btn-app btn-lg btn-round"> 显示下载二维码</a>
                 </div>
                 <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                     <div class="chocolat-parent">
                       <a href="/image2/ios/1.png" class="tutorial-pic chocolat-image" title="Just an example">
                         <div data-crop-image="500">
                           <img alt="image" src="/image2/ios/1.png" class="img-fluid">
                         </div>
                       </a>
                     </div>
                 </div>
                </div>
              </li>
               <li>
                <hr />
                <div class="row">
                 <div class="left-text col-xs-12 col-md-6 col-lg-6">
                  <label class="step-no">2.</label>
                  <p>点击这个按钮 👇👇👇，会自动跳转添加订阅。</p>
                  <a href="##" class="btn btn-icon icon-left btn-primary btn-app btn-lg btn-round copy-text" onclick="importSublink('ios')"> 一键导入shadowrocket 线路</a>
                 </div>
                 <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                     <div class="chocolat-parent">
                       <a href="/image2/ios/6.png" class="tutorial-pic chocolat-image" title="Just an example">
                         <div data-crop-image="500">
                           <img alt="image" src="/image2/ios/6.png" class="img-fluid">
                         </div>
                       </a>
                     </div>
                 </div>
                </div> </li>
               <li>
                <hr />
                <div class="row">
                 <div class="left-text col-xs-12 col-md-6 col-lg-6">
                  <label class="step-no">3.</label>
                  <p>添加订阅成功 -> 点击连接</p>
                 </div>
                 <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                     <div class="chocolat-parent">
                       <a href="image2/ios/7.png" class="tutorial-pic chocolat-image" title="Just an example">
                         <div data-crop-image="522">
                           <img alt="image" src="image2/ios/7.png" class="img-fluid">
                         </div>
                       </a>
                     </div>
                 </div>
                </div> </li>
              </ul>
             </div>
            </div>
            <div class="text-center">
             <h3 style="margin-top: 50px;margin-bottom: 30px;">🤔</h3>
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
          <div class="card-body">
            <a tabindex="0" class="btn btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="<img alt='image' src='https://q4.qlogo.cn/g?b=qq&nk=1285243841@qq.com&s=3?d=retro' class='rounded-circle mr-1'>">Dismissible popover</a>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="legacy-modal-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">请用手机扫描二维码(请先切换AppleID)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="qr" style="text-align: center"></div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
        </div>
      </div>
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
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="js/kjua-0.6.0.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
    General();

    function importSublink(client) {
      IsCopy = getCookie('IsCopy');
      if(IsCopy == 'true') {
        if(client == 'ios') {
          str = 'shadowrocket://add/sub://' + '<?php echo $_SESSION["vmess_ios"]?>' + '?remarks=青桔';
          window.location = str;
        }
      }else {
        swal({
          icon: "error",
          title: '很抱歉,您尚未购买线路',
          buttons: ["好的", "了解线路"],
        })
        .then((value) => {
          if(value){
            window.location = 'shop.php';
          }
        });
      }
    }

    function getCookie(cname){
    	var name = cname + "=";
    	var ca = document.cookie.split(';');
    	for(var i=0; i<ca.length; i++) {
    		var c = ca[i].trim();
    		if (c.indexOf(name)==0) { return c.substring(name.length,c.length); }
    	}
    	return "";
    }

    function General(){
      appleid = '<?php echo $appleid ?>';
      if(appleid != ''){
        $("#appleid").html(appleid);
        $("#appleid").attr('class','fas fa-eye');
      }
      var el = kjua({text: 'https://apps.apple.com/us/app/shadowrocket/id932747118',rounded: 100,size: 260});
      document.querySelector('#qr').appendChild(el);
    }
    </script>

  </body>
  </html>
