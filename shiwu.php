<?php
/**
 * Created by PhpStorm.
 * User: harvey
 * Date: 15-4-14
 * Time: 下午2:12
 */
$em = $this->getDoctrine()->getEntityManager();
$em->getConnection()->beginTransaction();
try{

    $em->getConnection()->commit();
}catch (Exception $e){
    $em->getConnection()->rollBack();
};


include 'smtp.php';
$smtpserver = "smtp.163.com";
$smtpserverport = 25;//163邮箱服务器端口
$smtpusermail = "15021183372@163.com";//你的163服务器邮箱账号
$smtpemailto = "15021183372@163.com";//收件人邮箱
$smtpuser = "15021183372";//SMTP服务器的用户帐号 //你的邮箱账号(去掉@163.com)
$smtppass = "zhangtao1989"; //SMTP服务器的用户密码efpshmwuiclcuirf
$mailsubject = "测试邮件发送";//邮件主题
$mailbody = "PHP+MySQL";//邮件内容
$mailtype = "TXT";//邮件格式（HTML/TXT）,TXT为文本邮件

$smtp = new smtp($smtpserver,$smtpserverport,false,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.

//是否显示发送的调试信息
$smtp->debug = TRUE;
//发送邮件
$send = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

if($send==1){
    echo "邮件发送成功";
}else{
    echo "邮件发送失败<br/>";
}


/////////////////////////
phpinfo();
$to = "m15021183372@163.com";//收件人
$subject = "Test";//邮件主题
$message = "This is a test !";//邮件正文
//ini_set('SMTP','smtp.gmail.com');//发件SMTP服务器
//ini_set('smtp_port',25);//发件SMTP服务器端口
//ini_set('sendmail_from',"15021183372@163.com");//发件人邮箱
$from = "From:张涛 <15021183372@163.com>";
mail($to,$subject,$message, $from);