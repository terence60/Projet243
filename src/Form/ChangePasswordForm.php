<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\PasswordStrength;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;

class ChangePasswordForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                ],
                'first_options' => [
                'label' => 'Mot de passe',
                'label_html' => true,
                 'attr' => [
                'placeholder' => 'Saisir un mot de passe',
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez saisir votre mot de passe',
                        ]),
                         new Regex([ 
                   'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?.])([-+!*$@%_?.\w]{12,})$/',
                   'match' => true,
                   'message' => 'Votre mot de passe doit comporter au moins douze 
                    caractères, dont des lettres majuscules et minuscules, un chiffre et un symbole : 
                        - + ! * $ @ % _ ? . '
                     

                    ]),
                        new PasswordStrength(),
                        new NotCompromisedPassword(),
                    ],
                    'label' => 'New password',
                ],
                'second_options' => [
                    'label' => 'Confirmation du mot de passe',
                    'label_html' => true,
                    'attr' => [
                    'placeholder' => 'Confirmer le mot de passe'
                    ]
                    
                ],
                 'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),

                    new Regex([ 
                   'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_?.])([-+!*$@%_?.\w]{12,})$/',
                   'match' => true,
                   'message' => 'Votre mot de passe doit comporter au moins douze 
                    caractères, dont des lettres majuscules et minuscules, un chiffre et un symbole : 
                        - + ! * $ @ % _ ? . '
                     

                    ])
                ],
                'invalid_message' => 'Les mot de passe doivent etre identiques',
                'mapped' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
