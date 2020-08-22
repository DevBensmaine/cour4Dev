<?php

namespace Cours4Dev\FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class ,
                [
                   'required'=>'required',
               ])
                ->add('description',TextareaType::class)
                ->add('professor',EntityType::class,[
                    'class'=>'Cours4Dev\professorBundle\Entity\Professor',
                    'choice_label'=>'nom'
                ])
                ->add('save', SubmitType::class, [
                    'attr' => ['class' => 'save'],
                ]);
                
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cours4Dev\FormationBundle\Entity\Formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cours4dev_formationbundle_formation';
    }


}
