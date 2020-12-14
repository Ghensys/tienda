<?php

namespace App\Form;

use App\Entity\Carrito;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Talla;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CarritoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('talla', EntityType::class, [
                'class' => Talla::class,
                'choice_label' => 'nombre',
            ])
            ->add('cantidad')
            ->add('Comprar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Carrito::class,
        ]);
    }
}
