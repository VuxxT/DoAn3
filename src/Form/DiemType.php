<?php

namespace App\Form;

use App\Entity\Diem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DiemTraBai')
            ->add('DiemKtra15phut')
            ->add('DiemKtra1tiet')
            ->add('DiemThi')
            ->add('DiemTb')
            ->add('TenHK')
            ->add('TenMonHoc')
            ->add('TenHS')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Diem::class,
        ]);
    }
}
