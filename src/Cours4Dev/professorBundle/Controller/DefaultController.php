<?php

namespace Cours4Dev\professorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Cours4DevprofessorBundle:Default:index.html.twig');
    }
}
