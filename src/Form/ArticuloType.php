<?php

namespace App\Form;

use App\Entity\Articulo;
use App\Entity\Talla;
use App\Entity\Categoria;
use App\Entity\Color;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticuloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('color', EntityType::class, [
                'class' => Color::class,
                'choice_label' => 'nombre',
            ])
            ->add('precio_unitario')
            ->add('image', FileType::class, [
                'label' => 'Imagen',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => 'Ingrese una imagen valida'
                    ])
                ]
            ])
            ->add('Guardar', SubmitType::class)
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articulo::class,
        ]);
    }
}
