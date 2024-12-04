<?php

namespace App\Form;

use App\Entity\LichHoc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LichHocType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('SoTiet')
            ->add('Ngay')
            ->add('TenMonHoc')
            ->add('TenLop')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LichHoc::class,
        ]);
    }
}
