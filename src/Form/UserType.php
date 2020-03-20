<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, 
                $this->setFormConfiguration(
                    "Email / Identifiant", 
                    "Email . . .", [
                        'help' => 'Indiquez le mail  de l\'utilisateur.'
                    ]))
            // ->add('roles')
            ->add('password', TextType::class, 
                $this->setFormConfiguration(
                    "Mot de Passe", 
                    "Mot de Passe . . .", [
                        'help' => 'Indiquez le mot de passe  de l\'utilisateur.'
                    ]))
            ->add('userRoles', EntityType::class,
                $this->setChoiceFormConfiguration(
                    "Rôles", [
                        'class' => Role::class,
                        'choice_label' => 'description',
                        'multiple' => true,
                        'expanded' => true,
                        'required'   => false,
                        'empty_data' => null,
                        'help' => 'Si utilisateur de l\'application, choisissez le(s) rôle(s).'
                ]))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
