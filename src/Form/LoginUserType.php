<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class, 
            array(
                'attr' => array(
                    'placeholder' => 'Email',
                    'class' => 'form-control form-control-lg',
                ))
            )

            ->add('password',PasswordType::class, 
            array(
                'attr' => array(
                    'placeholder' => 'Mot de Passe',
                    'class' => 'form-control form-control-lg',
                ))
            )

            ->add('connexion',SubmitType::class,
            array(
            'attr' => array(
                'class' => 'btn btn-outline-primary btn-lg btn-block',
                ))
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
