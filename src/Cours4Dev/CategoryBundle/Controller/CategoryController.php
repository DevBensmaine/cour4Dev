<?php

namespace Cours4Dev\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cours4Dev\CategoryBundle\Entity\Category;
use Cours4Dev\CategoryBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('Cours4DevCategoryBundle:Category');
        $category = $repository->findAll();

        return $this->render('@Cours4DevCategory/Category/list.html.twig', array(
            'categorys' =>$category
        ));
    }

    public function addAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('cours4_dev_category_homepage', array());
        }
        return $this->render('@Cours4DevCategory/Category/add.html.twig' , array(
            'form' => $form->createView()
        ));
    }

    public function updateAction(Request $request , Category $category = null)
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($category&& $form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $category->setTitle($category->getTitle() );
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('cours4_dev_category_homepage', array());
        }
        else {
            return $this->render('@Cours4DevCategory/Category/update.html.twig', array(
                'form' => $form->createView(),
                '$category'=>$category
            ));
        }

    }

    public function deleteAction(Request $request , Category $category = null)
    {
        if ($category) {
            $em = $this->getDoctrine()->getManager();  
            $em->remove($category);
            $em->flush();
        }
        return $this->redirectToRoute('cours4_dev_category_homepage', array());
    }
}
