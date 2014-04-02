<?php

namespace Ens\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
       $logger = $this->get('logger');
       $logger->info(__METHOD__);
       $logger->notice('sample notice', $_SERVER);
       $logger->warn('sample warning', $_COOKIE);
       $logger->error('sample error', array(1, 2, 3));

        return $this->render('EnsJobeetBundle:Default:index.html.twig', array('name' => $name));
    }
}
