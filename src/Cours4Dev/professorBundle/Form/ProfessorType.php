<?php

namespace Cours4Dev\professorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfessorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
                ->add('nom')
                ->add('prenom')
                ->add('email')
                ->add('Add', SubmitType::class, [
                    'attr' => ['class' => 'btn btn-primary'],
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cours4Dev\professorBundle\Entity\Professor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cours4dev_professorbundle_professor';
    }


}
