<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, [
                'attr' => [
                'placeholder' => 'Nom', 
                'class' => 'form-control',
                ]
            ])
            ->add('prenom', null, [
                'attr' => [
                'placeholder' => 'Prenom', 
                'class' => 'form-control',
                ]
            ])
            ->add('birthday')
            ->add('password', null, [
                'attr' => [
                'placeholder' => 'Mot de Passe', 
                'class' => 'form-control',
                ]
            ])
            ->add('password', RepeatedType:: class, array(
                'type' => PasswordType:: class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
             ))
            ->add('telephone', null, [
                'attr' => [
                'placeholder' => 'Telephone', 
                'class' => 'form-control',
                ]
            ])
            ->add('adresse', null, [
                'attr' => [
                'placeholder' => 'Adresse', 
                'class' => 'form-control',
                ]
            ])
            ->add('email', null, [
                'attr' => [
                'placeholder' => 'Email', 
                'class' => 'form-control',
                ]
            ])
            ->add('S\'inscrire', SubmitType::class, [
                'attr' => [
                'class' => 'btn btn-dark btn-lg btn-block ',
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
