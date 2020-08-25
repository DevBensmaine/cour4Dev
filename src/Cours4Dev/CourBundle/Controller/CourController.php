<?php

namespace Cours4Dev\CourBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cours4Dev\CourBundle\Entity\Cour;
use Cours4Dev\CourBundle\Form\CourType;
use Symfony\Component\HttpFoundation\Request;

class CourController extends Controller
{
    public function indexAction()
    {

        $repository = $this->getDoctrine()->getRepository('Cours4DevCourBundle:Cour');
        $cours = $repository->findAll();

        return $this->render('@Cours4DevCour/Cour/index.html.twig', array(
            'cours' => $cours
        ));
    }

    public function addAction(Request $request)
    {
        $cour = new Cour();
        $form = $this->createForm(CourType::class,$cour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cour);
            $em->flush();
            return $this->redirectToRoute('cours4_dev_cour_homepage', array());
        }
        return $this->render('@Cours4DevCour/Cour/add.html.twig' , array(
            'form' => $form->createView()
        ));

        return $this->render('@Cours4DevCour/Cour/add.html.twig');
    }

  
    public function updateAction(Request $request , Cour $cour = null)
    {
        $form = $this->createForm(CourType::class, $cour);
        $form->handleRequest($request);

        if ( $cour && $form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $cour->setTitre($cour->getTitre());
            $cour->setDure($cour->getDure());
            $cour->setDescription($cour->getDescription());
            $em->persist($cour);
            $em->flush();
            return $this->redirectToRoute('cours4_dev_cour_homepage', array());
        }
        else {
            return $this->render('@Cours4DevCour/Cour/update.html.twig', array(
                'form' => $form->createView(),
                '$cour'=>$cour
            ));
        }

    }
    public function deleteAction(Request $request , Cour $cour = null)
    {
        if ($cour) {
            $em = $this->getDoctrine()->getManager();  
            $em->remove($cour);
            $em->flush();
        }
        return $this->redirectToRoute('cours4_dev_cour_homepage', array());
    }


}
