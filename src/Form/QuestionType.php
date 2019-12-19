<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', null, ['label' => 'Contenu'])
            ->add('good_answer', null, ['label' => 'Bonne réponse'])
            ->add('first_false', null, ['label' => 'Première Mauvaise Réponse'])
            ->add('second_false', null, ['label' => 'Seconde Mauvaise Réponse'])
            ->add('third_false', null, ['label' => 'Troisième Mauvaise Réponse'])
            ->add('quizz', null, [
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
