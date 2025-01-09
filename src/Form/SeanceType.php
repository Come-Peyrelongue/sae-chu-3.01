<?php

namespace App\Form;

use App\Entity\Seance;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de la séance',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('heureDebut', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Heure de début',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('heureFin', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Heure de fin',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('raison', TextType::class, [
                'label' => 'Raison de la séance',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('note', TextType::class, [
                'label' => 'Note (facultatif)',
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('patient', EntityType::class, [
                'class' => 'App\Entity\Patient',
                'choice_label' => function ($patient) {
                    return $patient->getNom().' '.$patient->getPrenom();
                },
                'label' => 'Patient',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('professionnel', EntityType::class, [
                'class' => 'App\Entity\Professionnel',
                'choice_label' => function ($pro) {
                    return $pro->getNom().' '.$pro->getPrenom();
                },
                'label' => 'Professionnel',
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
        ]);
    }
}
