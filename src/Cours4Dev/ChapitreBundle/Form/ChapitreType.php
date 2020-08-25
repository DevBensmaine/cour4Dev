<?php

namespace Cours4Dev\ChapitreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ChapitreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction( $options['action'])
                ->add('titre')
                ->add('formation',EntityType::class,[
                    'class'=>'Cours4Dev\FormationBundle\Entity\Formation',
                    'choice_label'=>'titre'
                ])
                ->add('Add', SubmitType::class, [
                    'attr' => ['class' => 'btn btn-primary'],
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cours4Dev\ChapitreBundle\Entity\Chapitre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cours4dev_chapitrebundle_chapitre';
    }


}
