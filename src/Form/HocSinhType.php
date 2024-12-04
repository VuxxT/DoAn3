<?php

namespace App\Form;

use App\Entity\HocSinh;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HocSinhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TenHS')
            ->add('Email')
            ->add('SDT')
            ->add('DiaChi')
            ->add('TenPhuHuynh')
            ->add('SDTPH')
            ->add('TenLop')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HocSinh::class,
        ]);
    }
}
