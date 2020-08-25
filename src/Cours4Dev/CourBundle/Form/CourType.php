<?php

namespace Cours4Dev\CourBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CourType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction( $options['action'])
                ->add('titre')
                ->add('dure')
                ->add('description')
                ->add('formation',EntityType::class,[
                    'class'=>'Cours4Dev\FormationBundle\Entity\Formation',
                    'choice_label'=>'titre'
                ])
                ->add('chapitre',EntityType::class,[
                    'class'=>'Cours4Dev\ChapitreBundle\Entity\Chapitre',
                    // 'query_builder' => function (EntityRepository $er) {
                    //     // return $er->createQueryBuilder('u')->where()
                    //         // ->orderBy('u.titre', 'ASC');
                    // },
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
            'data_class' => 'Cours4Dev\CourBundle\Entity\Cour'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cours4dev_courbundle_cour';
    }


}
