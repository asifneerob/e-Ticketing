<?php

namespace App\Form;

use App\Entity\BusesRoutes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusesRoutesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('routeId')
            ->add('routesFrom')
            ->add('routesTo')
            ->add('time')
            ->add('date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BusesRoutes::class,
        ]);
    }
}
