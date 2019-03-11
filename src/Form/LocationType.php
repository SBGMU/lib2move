<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('DateLocation')
            
            ->add('VilleDarriver', ChoiceType::class, [
                'choices'  => [
                    'Paris' => 'Paris',
                    'Marseille' => 'Marseille',
                    
                ],])
                ->add('VilleDepart', ChoiceType::class, [
                    'choices'  => [
                        'Marseille' => 'Marseille',
                        'Paris' => 'Paris',
                    ],])
                        ->add('DateDebut', null, [
                            'attr' => [
                            'class' => 'Example date',
                            ]
                        ])
            ->add('DateFin', null, [
                'attr' => [
                'class' => 'Example date',
                ]
            ])
            //->add('User')
            ->add('Reserver',SubmitType::class,
            array(
            'attr' => array(
                'class' => 'btn btn-outline-primary btn-lg btn-block',
                ))
            );
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
