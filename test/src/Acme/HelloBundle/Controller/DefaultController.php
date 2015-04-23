<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Entity\First;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $author = new First();
        $author->setName($name);
        $author->setAge(20);
        //... 对$auother对象做些什么
        $form = $this->createFormBuilder($author)
            ->add('task','text')
            ->add('dueDate','date')
            ->getForm();


        $validator = $this->get('validator');
        $errors = $validator->validate($author);

        if(count($errors) >0){
            return new Response(print_r($errors, true));
        }else{
            return new Response('The author is valid! Yes!');
        }
        //return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name));
    }
    /*
     * @
     * */
    public function formAction()
    {

    }
}
