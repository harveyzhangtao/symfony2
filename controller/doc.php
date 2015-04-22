
config.yml
swiftmailer:
transport: "%mailer_transport%"
+    encryption: ssl
+    auth_mode: login
     host:      "%mailer_host%"
     username:  "%mailer_user%"
     password:  "%mailer_password%"

/////////
mail函数虚拟发送 需要本地安装sendmail   sudo yum install sendmail
php.ini 需要开启
sendmail_path = /usr/sbin/sendmail -t -i
SMTP = smtp.163.com


//////////
smtp_mail 发送要确认 开启php_openssl



两个都要确认邮箱开启了  smtp服务
