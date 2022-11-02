<?php

namespace App\Form;

use App\Entity\Lists;
use App\Entity\Tasks;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TaskCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('dateLimited', DateType::class, [  
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Echéance: ',
                'input' => 'string',
                'format' => 'dd/MM/yyyy'
            ])
            ->add('list', EntityType::class, [
                'class' => Lists::class,
                'choice_label'=> 'id',
                'mapped' => false
            ])
            // ->add('list', CollectionType::class, [
            //     'entry_type' => ListCreateType::class,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            //     'prototype' => true,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tasks::class,
        ]);
    }
}
