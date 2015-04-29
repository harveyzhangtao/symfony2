
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


/////////////////////////////////////////////
form validation
public function setDefaultOptions(OptionsResolverInterface $resolver)
{
$resolver->setDefaults(array(
//...
'data_class' => 'XXX\AppBundle\Entity\App'
'validation_groups' =>  array('full', 'Default'), ////// Entity   @Assert\NotBlank( groups={"full"})
));
}


校验一个值
// 在controller类前引用相应的校验命名空间
use Symfony\Component\Validator\Constraints\Email;

public function addEmailAction($email)
{
    $emailConstraint = new Email();
    // 所有的校验选项（options）都可以这样设置
    $emailConstraint->message = 'Invalid email address';

    // 使用validator来校验一个值
    $errorList = $this->get('validator')->validateValue($email, $emailConstraint);

    if (count($errorList) == 0) {
        // 这是一个合法的email地址，可以做些什么
    } else {
        // 这是一个非法的email地址
        $errorMessage = $errorList[0]->getMessage()

        // 做一些错误处理
    }

    // ...
}



//////////////////////////////////多个表集合到一个form
namespace  My\Bundle\Form\Model;
class Registration
{
    /* @var My\Bundle\Entity\User */
    public $user;
    /* @var My\Bundle\Entity\Company */
    public $company;
}



namespace  My\Bundle\Form\Type;
class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
    $builder->add('user', new UserType());
    $builder->add('company', new CompanyType());
    }

    public function getDefaultOptions(array $options)
    {
    return array(
    'data_class' => 'My\Bundle\Form\Model\Registration',
    );
}
}




//selinux linux的安全认证
http://forum.piwik.org/read.php?2,125856,125865