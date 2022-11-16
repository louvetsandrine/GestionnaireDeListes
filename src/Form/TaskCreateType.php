<?php

namespace App\Form;

use App\Entity\Lists;
use App\Entity\Tasks;
use App\Entity\Users;
use App\Repository\ListsRepository;
use App\Repository\UsersRepository;
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
            ->add('user', EntityType::class, [
                'class' => Users::class,
                'choice_label'=> 'name',
                'choice_value'=> 'id',
                'placeholder' => '-- Sélectionner un collaborateur --',
                'query_builder' => function (UsersRepository $usersRepository) {
                    return $usersRepository->createQueryBuilder('u')->orderBy('u.name', 'ASC');
                },
                'mapped' => false
            ])
            ->add('dateLimited', DateType::class, [  
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Echéance: ',
                'input' => 'string',
                'format' => 'dd/MM/yyyy'
            ])
            ->add('list', EntityType::class, [
                'class' => Lists::class,
                'choice_label'=> 'name',
                'choice_value'=> 'name',
                'placeholder' => '-- Sélectionner une liste --',
                'query_builder' => function (ListsRepository $listsRepository) {
                    return $listsRepository->createQueryBuilder('l')->orderBy('l.name', 'ASC');
                },
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tasks::class,
        ]);
    }
}
