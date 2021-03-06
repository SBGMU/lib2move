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
                'label' => 'Ville d\'arrivee',
                'choices'  => [
                    'Paris' => 'Paris',
                    'Marseille' => 'Marseille',
                    
                ],])
            ->add('VilleDepart', ChoiceType::class, [
                'label' => 'Ville de depart',
                'choices'  => [
                    'Marseille' => 'Marseille',
                    'Paris' => 'Paris',
                ],])
            ->add('DateDebut', DateTimeType::class, [
                'widget' => 'single_text',
            'required' => false,
            'html5' => false,
            'attr' => [
            'class' => 'DateDebut',
            'placeholder' => 'Date de debut',
                ]
            ])
            ->add('DateFin', DateTimeType::class, [
                    'widget' => 'single_text',
                    'required' => false,
                    'html5' => false,
                    'attr' => [
                    'class' => 'DateFin',
                    'placeholder' => 'Date de fin',


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
