<?php
// src/Acme/TaskBundle/Controller/TaskController.php
namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Task;
use Acme\DemoBundle\Entity\Tag;
use Acme\DemoBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
class TaskController extends Controller
{
    /**
     * @Route("/", name="_demo_form")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $task = new Task();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tag();
        $tag1->name = 'tag1';
        $task->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->name = 'tag2';
        $task->getTags()->add($tag2);
        // end dummy code

        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('AcmeDemoBundle:Demo:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}