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
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\DateType;
=======
>>>>>>> refs/remotes/origin/master

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
<<<<<<< HEAD
            ->add('password', null, [
                'attr' => [
                'placeholder' => 'Mot de Passe', 
                'class' => 'form-control',
                ]
            ])
=======
           
>>>>>>> refs/remotes/origin/master
            ->add('password', RepeatedType:: class, array(
                'type' => PasswordType:: class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
<<<<<<< HEAD
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
=======
                ))
            ->add('Telephone')
            ->add('Adresse')
            ->add('Email')
            ->add('submit', SubmitType::class)
>>>>>>> refs/remotes/origin/master
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
