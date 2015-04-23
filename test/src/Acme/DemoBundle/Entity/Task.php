<?php
/**
 * Created by PhpStorm.
 * User: harvey
 * Date: 15-4-23
 * Time: 下午5:13
 */
// src/Acme/TaskBundle/Entity/Task.php
namespace Acme\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Task
{
    protected $description;

    protected $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTags()
    {
        return $this->tags;
    }
}