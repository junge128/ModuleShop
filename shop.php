<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>商店 &mdash; 模块化商店</title>
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
  <link rel="stylesheet" href="css/shop.css">
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
            <span><img id="img-buffer" alt="image" style="width: 25px" src="/image/icon.svg"></span>
          </div>
          <ul class="sidebar-menu">
           <li><a class="nav-link" href="/user.php"><i class="fab fa-fort-awesome"></i> <span>首页</span></a></li>
           <li class="active"><a class="nav-link" href="/shop.php"><i class="fas fa-store"></i> <span>购买开通</span></a></li>
           <li class="menu-header">使用</li>
           <li><a class="nav-link" href="/node.php"><i class="fas fa-server"></i> <span>节点列表</span></a></li>
           <li><a class="nav-link" href="/tutorial.php"><i class="fas fa-book"></i> <span>下载和教程</span></a></li>
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
          <h1>商店</h1>
          <div class="section-header-breadcrumb">
           <div class="breadcrumb-item active">
           </div>
          </div>
         </div>
         <div class="section-body">
          <h2 class="section-title">选择合适的会员订阅计划</h2>
          <p class="section-lead">竭尽全力为您提供优质的服务</p>
          <div class="row">
           <div class="col-12 col-md-4 col-lg-4">
            <div class="pricing pricing-highlight">
             <div class="title pricing-title">
               年付
             </div>
             <i class="hot fab fa-hotjar fa-lg"></i>
             <div class="pricing-padding">
              <div class="pricing-price">
               <div>
                &yen; 12
               </div>
               <div>
                每月
               </div>
              </div>
              <div class="pricing-details">
               <div class="pricing-item">
                <div class="pricing-item-icon">
                 <i class="fas fa-check"></i>
                </div>
                <div class="pricing-item-label">
                 无限流量
                </div>
               </div>
               <div class="pricing-item">
                <div class="pricing-item-icon">
                 <i class="fas fa-check"></i>
                </div>
                <div class="pricing-item-label">
                 速度无上限
                </div>
               </div>
               <div class="pricing-item">
                <div class="pricing-item-icon">
                 <i class="fas fa-check"></i>
                </div>
                <div class="pricing-item-label">
                 不限设备
                </div>
               </div>
               <div class="pricing-item">
                <div class="pricing-item-icon">
                 <i class="fas fa-check"></i>
                </div>
                <div class="pricing-item-label">
                 高强度加密
                </div>
               </div>
              </div>
             </div>
             <div class="pricing-cta">
              <a href="##" data-toggle="modal" data-target="#legacy-modal-1" onclick="choose('year')">购买 <i class="fas fa-arrow-right"></i></a>
             </div>
            </div>
           </div>
           <div class="col-12 col-md-4 col-lg-4">
             <div class="pricing pricing-highlight">
              <div class="title pricing-title">
                季付
              </div>
              <div class="pricing-padding">
               <div class="pricing-price">
                <div>
                 &yen; 13
                </div>
                <div>
                 每月
                </div>
               </div>
               <div class="pricing-details">
                <div class="pricing-item">
                 <div class="pricing-item-icon">
                  <i class="fas fa-check"></i>
                 </div>
                 <div class="pricing-item-label">
                  无限流量
                 </div>
                </div>
                <div class="pricing-item">
                 <div class="pricing-item-icon">
                  <i class="fas fa-check"></i>
                 </div>
                 <div class="pricing-item-label">
                  速度无上限
                 </div>
                </div>
                <div class="pricing-item">
                 <div class="pricing-item-icon">
                  <i class="fas fa-check"></i>
                 </div>
                 <div class="pricing-item-label">
                  不限设备
                 </div>
                </div>
                <div class="pricing-item">
                 <div class="pricing-item-icon">
                  <i class="fas fa-check"></i>
                 </div>
                 <div class="pricing-item-label">
                  高强度加密
                 </div>
                </div>
               </div>
              </div>
              <div class="pricing-cta">
               <a href="##" data-toggle="modal" data-target="#legacy-modal-1" onclick="choose('season')">购买 <i class="fas fa-arrow-right"></i></a>
              </div>
             </div>
            </div>
           <div class="col-12 col-md-4 col-lg-4">
              <div class="pricing pricing-highlight">
               <div class="title pricing-title">
                 月付
               </div>
               <div class="pricing-padding">
                <div class="pricing-price">
                 <div>
                  &yen; 15
                 </div>
                 <div>
                  每月
                 </div>
                </div>
                <div class="pricing-details">
                 <div class="pricing-item">
                  <div class="pricing-item-icon bg-warning text-white">
                   <i class="fas fa-circle"></i>
                  </div>
                  <div class="pricing-item-label">
                   50G 每月
                  </div>
                 </div>
                 <div class="pricing-item">
                  <div class="pricing-item-icon bg-warning text-white">
                   <i class="fas fa-circle"></i>
                  </div>
                  <div class="pricing-item-label">
                   50M 最高速率
                  </div>
                 </div>
                 <div class="pricing-item">
                  <div class="pricing-item-icon">
                   <i class="fas fa-check"></i>
                  </div>
                  <div class="pricing-item-label">
                   不限设备
                  </div>
                 </div>
                 <div class="pricing-item">
                  <div class="pricing-item-icon">
                   <i class="fas fa-check"></i>
                  </div>
                  <div class="pricing-item-label">
                   高强度加密
                  </div>
                 </div>
                </div>
               </div>
               <div class="pricing-cta">
                <a href="##" data-toggle="modal" data-target="#legacy-modal-1" onclick="choose('month')">购买 <i class="fas fa-arrow-right"></i></a>
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

  <div class="modal fade" tabindex="-1" role="dialog" id="legacy-modal-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">打开支付宝，扫码支付</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="qr" style="text-align: center"></div>
          <div id='loading' class="shop_loading">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="100px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50" xml:space="preserve">
                  <rect x="0" y="9.22656" width="4" height="12.5469" fill="#6777ef">
                      <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                      <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                  </rect>
                  <rect x="10" y="5.22656" width="4" height="20.5469" fill="#6777ef">
                      <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                      <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                  </rect>
                  <rect x="20" y="8.77344" width="4" height="13.4531" fill="#6777ef">
                      <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                      <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                  </rect>
              </svg>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <a id="to-alipay-app" href="##" target="blank" class="btn btn-primary">打开手机支付宝</a>
          <a id="to-alipay-app" href="user.php" class="btn btn-primary">完成支付,下一步</a>
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
    <script src="js/kjua-0.6.0.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
    function getqrurl(choice)
    {
    		$.ajax(
            {
                url:"/php/getpay.php",
                data:
                {
                  "buymonth": choice,
                  "webusername": '<?php echo $user?>'
                },
                type:"post",
                success: function(data) {
                    if(data.msg="success"){
    									data = JSON.parse(data);
    									qr = data.info.qr;
    									t_n = data.info.t_n;
                    //   alert(t_n);
                      $("#to-alipay-app").attr("href",qr);
                      $('#loading').css('display','none');
                      GeneralQr(qr);
                    }else{
    									console.log('提交失败');
                    }
                },
                error: function (data){
                    console.log('提交失败');
                }

            });
    }

    function GeneralQr(qr){
      var el = kjua({text: qr,rounded: 100,size: 260,mode: 'image',mSize: 20,image: window.document.getElementById('img-buffer')});
      document.querySelector('#qr').appendChild(el);
    }

    function ClearQr(){
      if(document.querySelector('#qr').childNodes.length > 0){
        document.querySelector('#qr').removeChild(document.querySelector('#qr').childNodes[0]);
      }
    }

    function choose(choice)
    {
        ClearQr();
        $('#loading').css('display','block');
    		getqrurl(choice);
    }
    </script>

  </body>
  </html>
