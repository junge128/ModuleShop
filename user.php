<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>用户中心 &mdash; 模块化商店</title>
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
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="css/user.css">

  <!-- C3 chart css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/c3@0.6.8/c3.min.css">
</head>

<?php
session_start();
$servername = "127.0.0.1";  //若用localhost在windows系统中测试 会进行是否ipv4 ipv6判断会耗费比较多时间
$username = "yyuanyin";
$password = "root";

if(isset($_SESSION["tuser"]))
{
  $user=$_SESSION["tuser"];
	$link = mysqli_connect($servername, $username, $password); //注意！这里的思路是，直接php调用，然后得到的结果 直接 php 变量传递给 js ，不同于其他的请求与服务端然后返回结果进行Js处理 ，登录原理保存也不同，一个是session,一个是cookies
	if($link)
  {
	  $select=mysqli_select_db($link,"yyuanyin");//选择数据库
	  if($select)
	  {
		  $str="select * from myguests where username = '$user'";
		  $result=mysqli_query($link,$str);
		  $pass=mysqli_fetch_row($result);
		  $buytime =  $pass[7];
		  $recentlogin = $pass[4];
		  $email = $pass[3];
		  $month = $pass[8];
		  $_SESSION["month"]=$month;
		  $_SESSION["email"]=$email;
		  if(strpos($email,'qq')){
			$_SESSION["user_img"] = 'https://q1.qlogo.cn/g?b=qq&nk='.$email.'&s=640';
		  }else{
			$_SESSION["user_img"] = 'image/icon.png';
		  }
		  $getvmess_ios = base64_encode('https://sssrrr.info/php/geturl.php?token='.base64_encode(base64_encode($user)));//ios用
		  $_SESSION["vmess_ios"]=$getvmess_ios;
		  $getvmess_commond = 'https://sssrrr.info/php/geturl.php?token='.base64_encode(base64_encode($user));//普通订阅连接
		  $_SESSION["vmess_commond"]=$getvmess_commond;
		  $getvmess_mac = 'https://sssrrr.info/php/geturl_mac.php?token='.base64_encode(base64_encode($user));//mac订阅连接
		  $_SESSION["vmess_mac"]=$getvmess_mac;
		  $getvmess_linux = 'https://sssrrr.info/php/geturl_linux.php?token='.base64_encode(base64_encode($user));//mac订阅连接
		  $_SESSION["vmess_linux"]=$getvmess_linux;

		  $str="select count(*) from myguests where recommend = '$user'";
			  $result=mysqli_query($link,$str);
			  $pass=mysqli_fetch_row($result);
		  $R_num = $pass[0];
	  }
  }
  $link = mysqli_connect($servername, $username, $password,"yyuanyin");
	if($link)
  {
	  $select=mysqli_select_db($link,"yyuanyin");//选择数据库
	  if($select)
	  {
			$str="select stats from v2raybuy where webusername = '$user'";
		  $result=mysqli_query($link,$str);
		  $pass=mysqli_fetch_row($result);
      if($pass == null){
        $stats =  '';
      }else{
  			$stats =  $pass[0];
        $stats = str_replace('\'','"',$stats);
      }
      // $stats = json_decode($stats, true);
	  }
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
           <li class="active"><a class="nav-link" href="user.php"><i class="fab fa-fort-awesome"></i> <span>首页</span></a></li>
           <li><a class="nav-link" href="/shop.php"><i class="fas fa-store"></i> <span>购买开通</span></a></li>
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
            <h1>用户中心</h1>
          </div>
          <div id='notify' class="animated fadeInDown delay-1s alert">

          </div>

          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
             <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-primary">
               <i class="fas fa-crown"></i>
              </div>
              <div class="card-wrap">
               <div class="card-header">
                <h4>会员时长</h4>
               </div>
               <div class="card-body">
                <span id='lesstime' class="counter">0</span> 天
               </div>
              </div>
              <div class="card-stats">
               <div class="card-stats-title" style="padding-top: 0;padding-bottom: 4px;">
                <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                  <li id='viptime' class="breadcrumb-item active" aria-current="page">
                   <!--已过期-->年会员 : 2020-02-21 到期 </li>
                 </ol>
                </nav>
               </div>
              </div>
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
             <div class="card card-statistic-2">
              <div class="card-icon shadow-info bg-info">
               <i class="fas fa-tint"></i>
              </div>
              <div class="card-wrap">
               <div class="card-header">
                <h4>已用流量</h4>
               </div>
               <div class="card-body">
                <span id='a_stats' class="counter">0</span> MB
               </div>
               <div class="card-stats">
                <div class="card-stats-title" style="padding-top: 0;padding-bottom: 4px;">
                 <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                   <li class="breadcrumb-item active" aria-current="page">今日已用: 0 MB</li>
                  </ol>
                 </nav>
                </div>
               </div>
              </div>
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
             <div class="card card-statistic-2">
              <div class="card-icon shadow-success bg-success">
               <i class="fas fa-tint"></i>
              </div>
              <div class="card-wrap">
               <div class="card-header">
                <h4>可用流量</h4>
               </div>
               <div class="card-body">
                <span id='less_liu' class="counter">0</span> GB
                <!-- ∞ / ∞ -->
               </div>
               <div class="card-stats">
                <div class="card-stats-title" style="padding-top: 0;padding-bottom: 4px;">
                 <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                   <li id='less_detail' class="breadcrumb-item active" aria-current="page">可用流量 0 MB</li>
                  </ol>
                 </nav>
                </div>
               </div>
              </div>
             </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
             <div class="card card-statistic-2">
              <div class="card-icon shadow-warning bg-warning">
               <i class="fas fa-wallet"></i>
              </div>
              <div class="card-wrap">
               <div class="card-header">
                <h4>成功推荐好友</h4>
               </div>
               <div class="card-body">
                <span id='R_num' class="counter">0</span> 位
               </div>
               <div class="card-stats">
                <div class="card-stats-title" style="padding-top: 0;padding-bottom: 4px;">
                 <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                   <li class="breadcrumb-item active" aria-current="page">总返利金额: &yen; 0</li>
                  </ol>
                 </nav>
                </div>
               </div>
              </div>
             </div>
            </div>
          </div>

          <div class="row">
           <div class="col-12">
            <div class="card">
             <div class="card-header">
              <h4><i class="fas fa-bullhorn"></i> 最新公告</h4>
             </div>
             <div class="card-body">
              <p>请收藏好本站<br /></p>
              <hr />
              <p>本站：<a href="https://yyuanyin.cn">https://yyuanyin.cn</a> <strong>建议收藏以防丢失联系</strong></p>
              <hr />
              <p><strong>官网界面2.24进行更新 优化用户体验</strong><br />做出线路优化<br />更新流量显示，新增修改密码系统<br />Mac、Ios平台更新支持一键导入线路配置<br /></p>
              <p><strong>联系邮箱: ceshi4d@outlook.com</strong></p>
             </div>
            </div>
           </div>
           <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
             <div class="card-header">
              <h4><i class="fas fa-chart-pie"></i> 流量使用情况</h4>
             </div>
             <div style="text-align: center" class="card-body">
              <div id="chart"></div>
             </div>
            </div>
           </div>
           <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
             <div class="card-header">
              <h4><i class="fas fa-bolt"></i> 便捷导入</h4>
             </div>
             <div class="card-body">
              <div class="buttons">
                <a href="/tutorial.php" id="v2ray-all-urls" class="btn btn-icon icon-left btn-primary btn-v2ray copy-config btn-lg btn-round"><i class="malio-v2rayng"></i> 点击查看 下载安装教程</a>
                <a href="##" class="btn btn-icon icon-left btn-primary btn-clash copy-text btn-lg btn-round" onclick="Copyconfig()" data-clipboard-text="<?php echo $getvmess_commond?>"><i class="malio-v2rayng"></i> 复制 订阅链接</a>
                <a href="##" class="btn btn-icon icon-left btn-primary btn-shadowrocket btn-lg btn-round" onclick="importSublink('shadowrocket')"><i class="malio-shadowrocket"></i> 一键导入 IOS 配置</a>
                <a href="##" class="btn btn-icon icon-left btn-primary btn-v2ray btn-lg btn-round" onclick="importSublink('mac')"><i class="malio-clash"></i> 一键导入 Mac 配置</a>
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
  <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="assets/modules/izitoast/js/iziToast.min.js"></script>

  <!-- Counter Up  -->
  <script src="https://cdn.jsdelivr.net/npm/waypoints@4.0.0/lib/jquery.waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script src="js/sweetalert.min.js"></script>

  <!-- C3 Chart -->
  <script src="https://cdn.jsdelivr.net/npm/d3@3.5.0/d3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/c3@0.4.10/c3.min.js"></script>


  <script>
    // iziToast.info({
    //   title: 'Tip：',
    //   message: '由于网站迁移过程中，5月14号后注册的用户数据部分丢失，请您联系客服QQ： 进行处理',
    //   position: 'topCenter',
    //   timeout: 15000
    // });
    iziToast.success({
      title: '最新公告：',
      message: 'This is Test',
      position: 'topCenter',
      timeout: 15000
    });
    // iziToast.warning({
    //   title: '温馨提醒!',
    //   message: '如果出现连接不上，麻烦更新一下订阅即可',
    //   position: 'topCenter',
    //   timeout: 15000
    // });

    IsCopy = false;
    setCookie('IsCopy',IsCopy);
    window.onload = function() {
    		var today = new Date();
    		var month = "<?php echo $month?>"; //读取月份
    		var R_num = "<?php echo $R_num?>"; //读取推荐人数
    		var stats = '<?php echo $stats?>'; //读取已经使用流量
    		month = parseFloat(month);          //转数字
    	  var recentlogin	= "<?php echo $recentlogin?>"; //最新登录时间
    		var user = "<?php echo $user?>";   //用户名
    		var email = "<?php echo $email?>"; //邮箱
    		var buytime = "<?php echo $buytime?>"; //第一次获取购买时间
    		buytime = buytime.replace(/,/g, "/");	//对苹果safari日期格式兼容 转为xx/xx/xx
    	  buytime = new Date(buytime); //购买时间转时间类型
    		buytime2 = new Date(buytime); //购买时间转时间类型2备份
    		buytime.setDate( buytime.getDate() + 30 * month + 1);
    		if (month > 0)
    		{
    		     type = "月会员";
    			 	 if(month > 2)
    			   {
         		     type = "季会员";
    			   }
    			   if(month > 11)
    			   {
         		     type = "年会员";
    			   }
    		}
    		else
    		{
            type = "普通用户";
    		}
    		if(isNaN(buytime))
    		{
            daoqi = '未购买会员';
            $("#viptime").html(type + ' : ' + daoqi);
            notify = '您尚未购买线路，可以 <a style="TEXT-DECORATION:underline" href="shop.php">点击了解详情</a>';
            $("#notify").html(notify);
            $("#notify").addClass("alert-warning");
    		}
    		else
    		{
    				if (today > buytime)
    				{
                daoqi = '会员已到期';
                $("#viptime").html('普通用户 : ' + daoqi);
                notify = '您的会员计划已过期，请及时续费。';
                $("#notify").html(notify);
                $("#notify").addClass("alert-warning");
    				}
    				else
    				{
                IsCopy = true;
                setCookie('IsCopy',IsCopy);
    					  var year=buytime2.getYear()+1900; //获取年 并且转换到正确形式
    					  var month=buytime2.getMonth()+1;  //获取 计算前 月 转到正确形式
    					  var date=buytime2.getDate();      //获取 具体日期
    					  var year2=buytime.getYear()+1900; //获取 计算后 年
    					  var month2=buytime.getMonth()+1;  //获取 计算后 月
    					  var date2=buytime.getDate();      //获取 计算后的日期
                var LessTime = Math.ceil((buytime - today) / (1000 * 60 * 60 * 24)); //向上取整
                $("#viptime").html(type + ' : ' + year2 + '年' + month2 + '月' + date2 + '日 到期');
                $("#lesstime").html(LessTime);
                notify = '第一次使用，可以参考 <a style="TEXT-DECORATION:underline" href="tutorial.php">各平台教程</a>';
                $("#notify").html(notify);
                $("#notify").addClass("alert-primary");
    				}
    		}
        if(IsCopy == true){
          if(stats != ''){
            stats =  $.parseJSON(stats);
            Allstats = parseFloat(stats['v2ray1']) + parseFloat(stats['v2ray2']) + parseFloat(stats['v2ray3']) + parseFloat(stats['band']) + parseFloat(stats['hk']);
            Allstats = Math.ceil(Allstats);
            $("#a_stats").html(Allstats);
            if("<?php echo $month?>" == '1'){
                $("#less_liu").html( Math.ceil(50 - (Allstats/1024) ));
                $("#less_detail").html('可用流量: ' + Math.ceil(51200 - Allstats ) + ' MB');
            }else{
                $("#less_liu").removeClass('counter');
                $("#less_liu").html('∞');
                $("#less_detail").html('无限流量');
            }
          }else{
            if("<?php echo $month?>" == '1'){
                $("#less_liu").html(50);
            }else{
                $("#less_liu").removeClass('counter');
                $("#less_liu").html('∞');
                $("#less_detail").html('无限流量');
            }
          }
        }
        $("#R_num").html(R_num);
        $('.counter').counterUp({
          delay: 10,
          time: 1000
        });
        GenerateChart(stats);
        //Copyconfig();
    }

    function GenerateChart(stats){
      if(IsCopy){
        var chart = c3.generate({
          bindto: '#chart',
          data: {
              columns: [
                  ['伦敦: ' + stats['v2ray1'] + ' MB', stats['v2ray1']],
                  ['香港: ' + stats['v2ray2'] + ' MB', stats['v2ray2']],
                  ['日本: ' + stats['v2ray3'] + ' MB', stats['v2ray3']],
                  ['洛杉矶: ' + stats['band'] + ' MB', stats['band']],
                  ['韩国: ' + stats['hk'] + ' MB', stats['hk']],
              ],
              type : 'donut'
          },
          donut: {
              label: {
                  format: function (value, ratio, id) {
                      return '';
                  }
              }
          }
        });
      }else{
        var chart = c3.generate({
          bindto: '#chart',
          data: {
              columns: [
                  ['未购买线路', 1]
              ],
              type : 'donut'
          },
          donut: {
              label: {
                  format: function (value, ratio, id) {
                      return '';
                  }
              }
          }
        });
      }
    }

    function Copyconfig() {
      if(IsCopy) {
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

    function importSublink(client) {
      if(IsCopy) {
        if(client == 'shadowrocket') {
          str = 'shadowrocket://add/sub://' + '<?php echo $getvmess_ios?>' + '?remarks=青桔';
          window.location = str;
        }
        if(client == 'mac') {
          str = 'clash://install-config?url=' + '<?php echo $getvmess_mac?>';
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

    function setCookie(cname,cvalue,hours){
    	var d = new Date();
    	d.setTime(d.getTime()+(hours*60*60*1000));
    	var expires = "expires="+d.toGMTString();
    	document.cookie = cname+"="+cvalue+"; "+expires;
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
