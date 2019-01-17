<?php

namespace App\Form;

use App\Entity\FullHouse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FullHouseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('postalCode')
            ->add('city')
            ->add('country')
            ->add('surface')
            ->add('bedNumber')
            ->add('avgRated')
            ->add('roomNumber')
            ->add('owner')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FullHouse::class,
        ]);
    }
}
