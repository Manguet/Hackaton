<?php

namespace App\Form;

use App\Entity\Multimedia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultimediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['label' => 'Nom'])
            ->add('URL')
            ->add('chapter', null, [
                'choice_label' => 'name',
                'label'        => 'Chapitre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Multimedia::class,
        ]);
    }
}
