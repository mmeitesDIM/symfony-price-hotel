<?php

namespace App\Form;

use App\Entity\ShareRoom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShareRoomType extends AbstractType
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
            ->add('placeLeaving')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShareRoom::class,
        ]);
    }
}
