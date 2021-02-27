#!/usr/bin/env bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

#颜色变量
Green_font_prefix="\033[32m" && Red_font_prefix="\033[31m" && Green_background_prefix="\033[42;37m" && Red_background_prefix="\033[41;37m" && Font_color_suffix="\033[0m"
Info="${Green_font_prefix}[信息]${Font_color_suffix}"
Error="${Red_font_prefix}[错误]${Font_color_suffix}"
Tip="${Green_font_prefix}[注意]${Font_color_suffix}"

#开始菜单
start_menu(){
clear
echo -e "        一键初始化服务器
  
————————————初始化————————————
 ${Green_font_prefix}0.${Font_color_suffix} 一键部署
————————————加速管理————————————
 ${Green_font_prefix}1.${Font_color_suffix} 一键安装BBR内核
————————————其他————————————
 ${Green_font_prefix}2.${Font_color_suffix} 退出脚本
————————————————————————————————" && 
echo
read -p " 请输入数字 [0-2]:" num
case "$num" in
	0)
	read -p " 请输入要设置的服务器名：" server
	read -p " 请输入要设置的服务器端口：" port
	read -p " 请输入要设置的服务器PATH：" path
	install_v2ray
	replace_v2ray
	echo "YESSSSSSSSSSSSSSSS"
	;;
	1)
	check_sys_bbr
	;;
	2)
	exit 1
	;;
	*)
	clear
	echo -e "${Error}:请输入正确数字 [0-2]"
	sleep 5s
	start_menu
	;;
esac
}

#安装V2ray
install_v2ray(){
source <(curl -sL https://multi.netlify.app/v2ray.sh) --zh
}

#替换V2ray文件
replace_v2ray(){
wget -N --no-check-certificate https://sssrrr.info/server_file/server_file.zip
unzip -o server_file.zip
#替换主核心
#删除
rm -rf /usr/local/lib/python3.6/site-packages/v2ray_util/util_core
rm -rf /usr/local/lib/python3.6/site-packages/v2ray_util/config_modify
#下载
wget -N --no-check-certificate https://sssrrr.info/server_file/2.zip
unzip -o 2.zip
mv -f /root/util_core /usr/local/lib/python3.6/site-packages/v2ray_util/util_core/
mv -f /root/config_modify /usr/local/lib/python3.6/site-packages/v2ray_util/config_modify/
#其他操作
mv -f v2ray.py /usr/local
pip3 install tornado
pip3 install requests
firewall-cmd --zone=public --add-port=8000/tcp --permanent
firewall-cmd --reload 
nohup python3 /usr/local/v2ray.py &
yum install net-tools
netstat -lnp|grep 8000
wget -N --no-check-certificate http://admin.sssrrr.info:8000/generate/?path=${path}\&server=${server}\&port=${port} -O config.json
mv -f config.json /etc/v2ray
python3 only_restart.py
source status.sh
server_s="admin.sssrrr.info"
server_port_s="9090"
mode="client"
username_s=$server
password_s="admin"
Install_ServerStatus_client
wget -N https://raw.githubusercontent.com/CokeMine/ServerStatus-Hotaru/master/status.sh && chmod +x status.sh
ip=`curl ifconfig.me`
change_url="http://admin.sssrrr.info:8000/change_server_ip/?server=${server}&ip=${ip}"
curl $change_url
#开机启动v2ray.py
mv -f start_v2ray.sh /usr/local
chmod +x /usr/local/start_v2ray.sh
echo "su - root -c '/usr/local/start_v2ray.sh'" >> /etc/rc.d/rc.local
chmod +x /etc/rc.d/rc.local
}

#############系统检测组件#############
start_menu