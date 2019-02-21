<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numSerie', null, [
                'attr' => [
                'placeholder' => 'N° Serie', 
                'class' => 'form-control',
                ]
            ])
            ->add('marque', null, [
                'attr' => [
                'placeholder' => 'Marque', 
                'class' => 'form-control',
                ]
            ])
            ->add('modele', null, [
                'attr' => [
                'placeholder' => 'Modèle', 
                'class' => 'form-control',
                ]
            ])
            ->add('couleur', null, [
                'attr' => [
                'placeholder' => 'Couleur', 
                'class' => 'form-control',
                ]
            ])
            ->add('immatriculation', null, [
                'attr' => [
                'placeholder' => 'Plaque d\'immatricultaion', 
                'class' => 'form-control',
                ]
            ])
            ->add('nbKm', null, [
                'attr' => [
                'placeholder' => 'Kilométrage', 
                'class' => 'form-control',
                'step' => '5000',
                'min' => '0',
                ]
            ])
            ->add('dateAchat', null, [
                'attr' => [
                'class' => 'Example date',
                ]
            ])
            ->add('prixAchat', null, [
                'attr' => [
                'placeholder' => 'Prix d\'achat', 
                'class' => 'form-control',
                'step' => '5000',
                'min' => '0',
                ]
            ])
            ->add('image', FileType::class, [
                'multiple' => true,
                'attr'     => [
                    'accept' => 'image/*',
                    'multiple' => 'multiple', 
                    'class' => 'form-control-file',
                ]
            ])
        
            ->add('Enregistrer', SubmitType::class, [
                'attr' => [
                'class' => 'btn btn-success btn-lg btn-block',
                ]
            ]) //Submit Button
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
