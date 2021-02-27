<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Linux 使用教程 &mdash; 模块化商店</title>
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

  <style>
    .btn-app {
      background: linear-gradient(to right, #d74613, #d74613) !important;
      color: white !important;
      border: none;
      box-shadow: 0 2px 6px #d747139f;
      margin-bottom: 16px;
    }

    code {
      color: #d74613;
      background: #f8f8f8;
      border-radius: .15rem;
    }

    .card a {
      color: #d74613;
    }

    .steps {
      margin: 10px;
      padding: 0px;
    }

    li {
      list-style: none;
    }

    .step-no {
      font-size: 30px;
      font-weight: 700;
      color: #d74613;
    }

    .right-pic {
      text-align: right;
    }

    .tutorial-pic img {
      border-radius: 5px;
      width: 100%;
      max-width: 24rem;
    }

    @media (max-width: 767px) {
      .right-pic {
        display: block;
      }

      .tutorial-pic img {
        margin-top: 16px;
        border-radius: 5px;
        max-width: 100%;
      }

      .qrcode-btn {
        display: none
      }

      .hide-on-mobie {
        display: none;
      }
    }

    .faq h6 {
      color: #191d21;
    }

    .faq h6:before {
      content: ' ';
      border-radius: 5px;
      height: 6px;
      width: 6px;
      background-color: #d74613;
      display: inline-block;
      float: left;
      margin-top: 6px;
      margin-right: 8px;
    }

    .faq p {
      font-weight: normal !important;
    }
  </style>
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
            <h1>Linux 使用教程</h1>
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
                    <p>执行 <code>cd &amp;&amp; mkdir clash</code> 在用户目录下创建 clash 文件夹。</p>
                    <p>下载适合的 Clash 二进制文件并解压重命名为 <code>clash</code></p>
                    <p>一般个人的64位电脑下载 clash-linux-amd64.tar.gz 即可。</p>
                    <p>然后再下载Country.mmdb文件到同一个目录下。</p>
                    <a href="https://github.com/Dreamacro/clash/releases" class="btn btn-icon icon-left btn-primary btn-app btn-lg btn-round" target="blank"><i class="fab fa-github"></i> 下载客户端</a>
                    <a href="files/Country.mmdb" class="btn btn-icon icon-left btn-primary btn-app btn-lg btn-round" target="blank"><i class="fab fa-github"></i> 下载文件</a>
                   </div>
                   <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                    <div class="tutorial-pic hide-on-mobie">
                     <img style="border:1px solid #f0f0f0" src="/image2/linux/windows-cfw-1.png" />
                    </div>
                   </div>
                  </div> </li>
                 <li>
                  <hr />
                  <div class="row">
                   <div class="left-text col-xs-12 col-md-6 col-lg-6">
                    <label class="step-no">2.</label>
                    <p>在终端 <code>cd</code> 到 Clash 二进制文件所在的目录，执行<br> <code id='code'>wget -O config.yaml <?php echo $_SESSION["vmess_linux"];?> --no-check-certificate</code> <br>下载 Clash 配置文件</p>
                    <a href="##" class="btn btn-icon icon-left btn-primary btn-app btn-lg btn-round copy-text" onclick="Copyconfig()" data-clipboard-text="wget -O config.yaml <?php echo $_SESSION["vmess_linux"]; ?> --no-eck-certificate"><i class="malio-clash"></i> 复制 wget 命令</a>
                   </div>
                   <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                    <div class="tutorial-pic">
                     <img src="/image2/linux/linux-clash-2.jpg" />
                    </div>
                   </div>
                  </div> </li>
                 <li>
                  <hr />
                  <div class="row">
                   <div class="left-text col-xs-12 col-md-6 col-lg-6">
                    <label class="step-no">3.</label>
                    <p>执行 <code>./clash -d .</code> 即可启动 Clash，同时启动 HTTP 代理和 Socks5 代理。</p>
                    <p>如提示权限不足，请执行 <code>chmod +x clash</code></p>
                   </div>
                   <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                    <div class="tutorial-pic">
                     <img style="border:1px solid #f0f0f0" src="/image2/linux/linux-clash-3.jpg" />
                    </div>
                   </div>
                  </div> </li>
                 <li>
                  <hr />
                  <div class="row">
                   <div class="left-text col-xs-12 col-md-6 col-lg-6">
                    <label class="step-no">4.</label>
                    <p>访问 <a href="http://clash.razord.top/" target="blank">Clash Dashboard <i class="zmdi zmdi-open-in-new"></i></a> 可以进行切换节点、测延迟等操作。</p>
                    <p>Host: <code>127.0.0.1</code>，端口: <code>9090</code></p>
                   </div>
                   <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                    <div class="tutorial-pic">
                     <img style="border:1px solid #f0f0f0" src="/image2/linux/linux-clash-4.jpg" />
                    </div>
                   </div>
                  </div> </li>
                 <li>
                  <hr />
                  <div class="row">
                   <div class="left-text col-xs-12 col-md-6 col-lg-6">
                    <label class="step-no">5.</label>
                    <p>以 Ubuntu 19.04 为例，打开系统设置，选择网络，点击网络代理右边的 ⚙ 按钮，选择手动，填写 HTTP 和 HTTPS 代理为 <code>127.0.0.1:7890</code>，填写 Socks 主机为 <code>127.0.0.1:7891</code>，即可启用系统代理。</p>
                   </div>
                   <div class="right-pic col-xs-12 col-md-6 col-lg-6">
                    <div class="tutorial-pic">
                     <img style="border:1px solid #f0f0f0" src="/image2/linux/linux-clash-5.jpg" />
                    </div>
                   </div>
                  </div> </li>
                </ul>
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
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
    IsCopy = getCookie('IsCopy');
    if(IsCopy == 'false'){
      $("#code").html('您尚未开通线路,代码无法显示');
    }

    function Copyconfig() {
      if(IsCopy == 'true') {
        var clipboard = new ClipboardJS('.btn');
        clipboard.on('success', function (e) {
          var title = '已复制到您的剪贴板';
          swal({
            icon: "success",
            title: title,
            timer: 1500
          });
        });
        clipboard.on("error", function (e) {
          console.error('Action:', e.action);
          console.error('Trigger:', e.trigger);
          console.error('Text:', e.text);
        });
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
    </script>

  </body>
  </html>
