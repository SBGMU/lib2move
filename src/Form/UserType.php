<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', null, [
                'attr' => [
                'placeholder' => 'Nom', 
                'class' => 'form-control',
                ]
            ])
            ->add('Prenom', null, [
                'attr' => [
                'placeholder' => 'Prenom', 
                'class' => 'form-control',
                ]
            ])
            ->add('birthday')
            ->add('roles')
            ->add('password', null, [
                'attr' => [
                'placeholder' => 'Mot de Passe', 
                'class' => 'form-control',
                ]
            ])
            ->add('Telephone', null, [
                'attr' => [
                'placeholder' => 'Telephone', 
                'class' => 'form-control',
                ]
            ])
            ->add('Adresse', null, [
                'attr' => [
                'placeholder' => 'Adresse', 
                'class' => 'form-control',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
