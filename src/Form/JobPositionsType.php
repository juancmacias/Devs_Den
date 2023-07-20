<?php

namespace App\Form;

use App\Entity\JobPositions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobPositionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('company_name')
            ->add('website')
            ->add('description')
            ->add('position_title')
            ->add('position_description')
            ->add('requirements')
            ->add('salary')
            ->add('employment_mode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobPositions::class,
        ]);
    }
}
