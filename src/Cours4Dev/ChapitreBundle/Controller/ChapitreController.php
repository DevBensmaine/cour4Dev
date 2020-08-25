<?php

namespace Cours4Dev\ChapitreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cours4Dev\ChapitreBundle\Entity\Chapitre;
use Cours4Dev\ChapitreBundle\Form\ChapitreType;

class ChapitreController extends Controller
{
    public function indexAction()
    { 
        $repository = $this->getDoctrine()->getRepository('Cours4DevChapitreBundle:Chapitre');
        $chapitre = $repository->findAll();

        return $this->render('@Cours4DevChapitre/Chapitre/index.html.twig', array(
            'chapitres' =>$chapitre
        ));

        return $this->render('@Cours4DevChapitre/Chapitre/index.html.twig');
    }


    public function addAction(Request $request)
    { 
        $chapitre= new Chapitre();
        $form = $this->createForm(ChapitreType::class,$chapitre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($chapitre);
            $em->flush();
            return $this->redirectToRoute('cours4_dev_chapitre_homepage', array());
        } else {
            return $this->render('@Cours4DevChapitre/Chapitre/add.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }


    public function updateAction(Request $request , Chapitre $chapitre = null)
    { 

        $form = $this->createForm(ChapitreType::class, $chapitre);
        $form->handleRequest($request);

        if ($chapitre && $form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // $chapitre->setTitre($chapitre ->getTitre());
            // $chapitre->setFormation($chapitre->getFormation());
            $em->persist($chapitre );
            $em->flush();
            return $this->redirectToRoute('cours4_dev_chapitre_homepage', array());
        }
        else {
            return $this->render('@Cours4DevChapitre/Chapitre/update.html.twig', array(
                'form' => $form->createView(),
                'chapitre'=>$chapitre
            ));
        }
    }

    public function deleteAction(Request $request , Chapitre $chapitre = null)
    {
        if ($chapitre) {
            $em = $this->getDoctrine()->getManager();  
            $em->remove($chapitre);
            $em->flush();
        }
        return $this->redirectToRoute('cours4_dev_chapitre_homepage', array());
    }
} 
