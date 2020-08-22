<?php

namespace Cours4Dev\professorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cours4Dev\professorBundle\Entity\Professor;
use Cours4Dev\professorBundle\Form\ProfessorType;
use Symfony\Component\HttpFoundation\Request;

class ProfessorController extends Controller
{
    public function addAction()
    {
        $professor = new Professor();
        $form = $this->createForm(ProfessorType::class, $professor, array(
            'action'=>$this->generateUrl('professoraddForm')
        ));
      
        return $this->render('@Cours4Devprofessor/Professor/add.html.twig', array(
            'form' => $form->createView()
        ));
    }


    public function addProfessorAction(Request $request)
    {
        $professor = new Professor();
        $form = $this->createForm(ProfessorType::class, $professor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($professor);
            $em->flush();
            return $this->redirectToRoute('professorlist', array());
        }
        else {
            return $this->render('@Cours4Devprofessor/Professor/add.html.twig', array(
                'form' => $form->createView()
            ));
        }
      
    }
    public function updateAction(Request $request ,Professor $professor = null)
    {
        $form = $this->createForm(ProfessorType::class, $professor);
        $form->handleRequest($request);


        if ($professor && $form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $professor->setNom($professor->getNom() );
                $professor->setPrenom($professor->getPrenom() );
                $professor->setEmail($professor->getEmail() );
                $em->persist($professor);
                $em->flush();
                return $this->redirectToRoute('professorlist', array());
            }
    
            else {
                return $this->render('@Cours4Devprofessor/Professor/update.html.twig', array(
                    'form' => $form->createView(),
                    'professor'=>$professor
                ));
            }
       
    }

    public function deleteAction(Request $request ,Professor $professor = null)
    {

        if ($professor) {
            $em = $this->getDoctrine()->getManager();  
            $em->remove($professor);
            $em->flush();
        }
        return $this->redirectToRoute('professorlist', array());
    }

    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('Cours4DevprofessorBundle:Professor');
        $professors = $repository->findAll();

        return $this->render('@Cours4Devprofessor/Professor/list.html.twig', array(
            'professors' =>$professors
        ));
    }

}
