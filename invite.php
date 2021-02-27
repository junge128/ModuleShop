<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>邀请注册 &mdash; 模块化商店</title>
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
  <link rel="stylesheet" href="css/invite.css">
</head>

<?php
session_start();
$servername = "127.0.0.1";  //若用localhost在windows系统中测试 会进行是否ipv4 ipv6判断会耗费比较多时间
$username = "yyuanyin";
$password = "root";

if(isset($_SESSION["tuser"]))
{
  $user=$_SESSION["tuser"];
  $code =  base64_encode($user);
  $recommend = 'https://sssrrr.info/register.html?recommend_id=' . $code;
	$link = mysqli_connect($servername, $username, $password); //注意！这里的思路是，直接php调用，然后得到的结果 直接 php 变量传递给 js ，不同于其他的请求与服务端然后返回结果进行Js处理 ，登录原理保存也不同，一个是session,一个是cookies
	if($link)
  {
	    mysqli_select_db($link,"yyuanyin");//选择数据库
  	  $str="select * from myguests where recommend = '$user'";
		  $result = mysqli_query($link,$str);
      $R_num = mysqli_num_rows($result);
      $json = array();
      if ($R_num > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              array_push($json,$row["email"],$row["reg_date"]);
          }
      }
      $json = json_encode($json);
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
           <li><a class="nav-link" href="/tutorial.php"><i class="fas fa-book"></i> <span>下载和教程</span></a></li>

           <li class="menu-header">我的</li>
           <li><a class="nav-link" href="/profile.php"><i class="fas fa-user"></i> <span>我的账号</span></a></li>
           <li><a class="nav-link" href="/code.php"><i class="fas fa-wallet"></i> <span>充值记录</span></a></li>
           <li class="active"><a class="nav-link" href="/invite.php"><i class="fas fa-laugh-squint"></i> <span>邀请注册</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
           <div style="margin-left: 0;margin-right: 0" class="section-header">
            <h1>邀请注册</h1>
           </div>
           <div class="section-body">
             <div class="row">
              <div class="col-12">
               <div class="card card-hero">
                <div class="card-header" style="border-radius: 3px;box-shadow: 0 2px 6px #ffc36f;border: none;background-image: linear-gradient(to bottom, #ffa425, #ffc36f) ">
                 <div class="card-icon">
                  <i class="fas fa-laugh-squint" style="color:#ffc36f"></i>
                 </div>
                 <h4 id='num' class="mt-2"> <?php echo $R_num;  ?> 位</h4>
                 <div class="card-description">
                  Hi，<?php echo $user?> ！您累计邀请好友
                 </div>
                </div>
               </div>
               <div class="hero text-white hero-bg-image hero-bg-parallax mb-4" data-background="/image/invite2.jpg">
                <div class="hero-inner">
                 <h2>如果您觉得好用，可以低调推荐给身边的朋友</h2>
                 <p class="lead">对此，非常感谢您的邀请。祝君一切安好！</p>
                 <div class="mt-4">
                   <a href="##" onclick="code()" class="btn btn-outline-white btn-lg btn-round btn-icon icon-left copy-text"><i class="far fa-copy"></i> 生成您的推荐码</a>
                   <a href="##" data-clipboard-text="<?php echo $recommend; ?>" class="btn btn-outline-white btn-lg btn-round btn-icon icon-left copy-text"><i class="far fa-copy"></i> 复制邀请链接</a>
                 </div>
                </div>
               </div>
               <div class="card">
                <div class="card-header">
                 <h4>好友列表</h4>
                </div>
                <div class="card-body">
                 <div class="table-responsive">
                  <table class="table table-striped table-md">
                   <tbody id='tab'>
                    <tr>
                     <th scope="col">好友邮箱</th>
                     <th scope="col">注册时间</th>
                    </tr>
                   </tbody>
                  </table>
                 </div>
                 <div class="pagination-render float-right">
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
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
    CreatTab();
    Copyconfig();

    function CreatTab() {
      json_data = '<?php echo $json;?>';
      if(json_data != '[]'){
        json_data = eval(json_data);
        length = json_data.length;
        tab_html = '';
        for(i = 0;i < length;i = i + 2){
            if(json_data[i + 1] == null){
              json_data[i + 1] = '';
            }
            tab_html = tab_html + '<tr><td>' + json_data[i] + '</td><td>' + json_data[i + 1] + '</td></tr>';
        }
        $("#tab").append(tab_html);
      }else{
        tab_html = '<tr><td>暂无好友</td></tr>';
        $("#tab").append(tab_html);
      }
    }

    function code() {
      swal("您的推荐码", "<?php echo $code; ?>");
    }

    function Copyconfig() {
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
    }

    </script>

  </body>
  </html>
