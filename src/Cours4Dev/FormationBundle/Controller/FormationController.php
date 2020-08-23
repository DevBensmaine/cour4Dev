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
            return $this->redirectToRoute('cours4_dev_formation_homepage', array());
        } else {
            return $this->render('@Cours4DevFormation/Formation/add.html.twig', array(
                'form' => $form->createView()
            ));
        }

    }

    public function updateAction(Request $request ,Formation $formation = null)
    {

        $form = $this->createForm(FormationType::class,$formation);
        $form->handleRequest($request);


        if ($formation && $form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $formation->setTitre( $formation->getTitre()  );
                $formation->setDescription( $formation->getDescription() );
                $formation->setProfessor($formation->getProfessor());
                $em->persist($formation);
                $em->flush();
                return $this->redirectToRoute('cours4_dev_formation_homepage', array());
            }
    
            else {
                return $this->render('@Cours4DevFormation/Formation/update.html.twig', array(
                    'form' => $form->createView(),
                    'formation'=>$formation
                ));
            }
       
    }

    public function deleteAction(Request $request , Formation $formation = null)
    {
        if ($formation) {
            $em = $this->getDoctrine()->getManager();  
            $em->remove($formation);
            $em->flush();
        }
        return $this->redirectToRoute('cours4_dev_formation_homepage', array());
    }
}
