<?php

namespace EnfantBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('age',TextType::class)
            ->add('cantine',TextType::class)
            ->add('idClasse', EntityType::class, [
                'class' => 'ClassBundle:Classe',
                'choice_label' => 'nom','label' => 'class name'
            ])
        ->add('idParent', EntityType::class, [
        'class' => 'AppBundle:User',
        'choice_label' => 'username','label' => 'Membre saff'
    ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EnfantBundle\Entity\Enfant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'enfantbundle_enfant';
    }


}
