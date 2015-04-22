<?php
namespace Jfpal\AppBundle\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Jfpal\AppBundle\Entity\App;
use Jfpal\AppBundle\Entity\Version;
use Jfpal\AppBundle\Entity\Status;
use Jfpal\AppBundle\Entity\ThemeSettings;
use Jfpal\AppBundle\Workflow\Model\VersionModel;
use Jfpal\AppBundle\Form\VersionType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\View;
use Doctrine\Common\Util\Debug;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Application\Sonata\MediaBundle\Entity\Media;
/**
 * AppNew controller.
 *
 * @Route("/adminemail")
 */
class EmailController extends Controller
{
    /**
     * Lists all AppInfo entities.
     *
     * @Route("/", name="admin_email")
     * @Method("GET")
     * @Template()
     */
    public function sendEmailAction()
    {

        $subject = 'title';
        $email  = '15021183372@163.com';
        $message = 'test mail';

        //$mail = $this->container->get('mailer');
        $transport = \Swift_SmtpTransport::newInstance('smtp.qq.com', 465, 'ssl')
            ->setUsername('358465355@qq.com')->setPassword('XXXX');
        $mail = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance('test')
            ->setSubject($subject)
            ->setFrom('herozhangtao@qq.com')
            ->setTo($email)
            ->setBody($message);

        $mail->send($message);
exit;
        return '';
    }

    /**
     * Lists all AppInfo entities.
     *
     * @Route("/local", name="admin_email_local")
     * @Method("GET")
     * @Template()
     */
    public function sendEmaillocalAction()
    {

        $to = "358465355@qq.com";//收件人
        $subject = "Test mail";//邮件主题
        $message = "This is a test !";//邮件正文
//ini_set('SMTP','smtp.gmail.com');//发件SMTP服务器
//ini_set('smtp_port',25);//发件SMTP服务器端口
//ini_set('sendmail_from',"15021183372@163.com");//发件人邮箱
        $from = "From:张涛 <15021183372@163.com>";
        mail($to,$subject,$message, $from);exit;
        return '';
    }
}