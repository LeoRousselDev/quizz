<?php

namespace App\Form;

use App\Entity\Quizz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizzType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'Nom du quizz',
                'attr' => array(
                    'placeholder' => 'Nom',
                    'class' => 'form-control')))
            ->add('id_user', null, array(
                'label' => 'ID user',
                'attr' => array(
                    'placeholder' => 'id',
                    'class' => 'form-control')))
            ->add('q1', null, array(
                'label' => 'Question n*1',
                'attr' => array(
                    'placeholder' => 'Question',
                    'class' => 'form-control')))
            ->add('r1', null, array(
                'label' => 'Réponse n*1',
                'attr' => array(
                    'placeholder' => 'Réponse',
                    'class' => 'form-control')))
            ->add('indiceq1', null, array(
                'label' => 'Indice question 1',
                'attr' => array(
                    'placeholder' => 'Indice',
                    'class' => 'form-control')))
            ->add('q2', null, array(
                'label' => 'Question n*2',
                'attr' => array(
                    'placeholder' => 'Question',
                    'class' => 'form-control')))
            ->add('r2', null, array(
                'label' => 'Réponse n*2',
                'attr' => array(
                    'placeholder' => 'Réponse',
                    'class' => 'form-control')))
            ->add('indiceq2', null, array(
                'label' => 'Indice question 2',
                'attr' => array(
                    'placeholder' => 'Indice',
                    'class' => 'form-control')))

            ->add('q3', null, array(
                'label' => 'Question n*3',
                'attr' => array(
                    'placeholder' => 'Question',
                    'class' => 'form-control')))
            ->add('r3', null, array(
                'label' => 'Réponse n*3',
                'attr' => array(
                    'placeholder' => 'Réponse',
                    'class' => 'form-control')))
            ->add('indiceq3', null, array(
                'label' => 'Indice question 3',
                'attr' => array(
                    'placeholder' => 'Indice',
                    'class' => 'form-control')))
            ->add('q4', null, array(
                'label' => 'Question n*4',
                'attr' => array(
                    'placeholder' => 'Question',
                    'class' => 'form-control')))
            ->add('r4', null, array(
                'label' => 'Réponse n*4',
                'attr' => array(
                    'placeholder' => 'Réponse',
                    'class' => 'form-control')))
            ->add('indiceq4', null, array(
                'label' => 'Indice question 4',
                'attr' => array(
                    'placeholder' => 'Indice',
                    'class' => 'form-control')))
            ->add('q5', null, array(
                'label' => 'Question n*5',
                'attr' => array(
                    'placeholder' => 'Question',
                    'class' => 'form-control')))
            ->add('r5', null, array(
                'label' => 'Réponse n*5',
                'attr' => array(
                    'placeholder' => 'Réponse',
                    'class' => 'form-control')))
            ->add('indiceq5', null, array(
                'label' => 'Indice question 5',
                'attr' => array(
                    'placeholder' => 'Indice',
                    'class' => 'form-control')))            ->add('id_category', null, array(
                'label' => 'ID catégorie',
                'attr' => array(
                    'placeholder' => 'Catégorie',
                    'class' => 'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quizz::class,
        ]);
    }
}
