<?php

namespace App\Form;

use App\Entity\Lists;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ListCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('author')
            ->add('priority', ChoiceType::class, [
                'label' => 'Priorité: ',
                'label_attr' => [
                    'class' => 'radio-inline',
                ],
                'choices' => [
                    'Oui'   => 'Urgent',
                    'Non'   => 'Pas urgent',
                ],
              'expanded' => true])
            ->add('dateLimited', DateType::class, [  
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Echéance: ',
                'format' => 'dd/MM/yyyy'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lists::class,
        ]);
    }
}
