<?php

namespace Cours4Dev\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cours4Dev\FormationBundle\Entity\Formation;
use Cours4Dev\FormationBundle\Form\FormationType;

class FormationController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('Cours4DevFormationBundle:Formation');
        $formation = $repository->findAll();

        return $this->render('@Cours4DevFormation/Formation/index.html.twig' , array(
            'formations' => $formation
        ));
    }

    public function addAction(Request $request)
    {
        $formation= new Formation();
        $form = $this->createForm(FormationType::class,$formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
            return $this->forward('Cours4Dev:FormationBundle:Formation:index');
        } else {
            return $this->render('@Cours4DevFormation/Formation/add.html.twig', array(
                'form' => $form->createView()
            ));
        }

    }

}
