<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('lastname', TextType::class)
            ->add('sector', ChoiceType::class, [ 
                'choices'  => [
                    'Direction' => 'Direction',
                    'Comptabilité' => 'Comptabilité',
                    'Marketing' => 'Marketing',
                    'Production' => 'Production',
                    'Ressources humaines' => 'Ressources humaines',
                    
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
