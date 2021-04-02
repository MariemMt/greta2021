<?php

namespace App\Form;

use App\Entity\Booking;
use App\Form\DataTransformer\FrenchToDatetimeTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{


    private $transformer;

    public function __construct(FrenchToDatetimeTransformer $transformer)
    {
        $this->transformer = $transformer;
    }



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate',TextType::class) 
            // ou alors plus simple mettre 
            // add('startDate',DateType::class,['widget'=>'single_text','html5'=>false]) 
            // on peut alors se passer des datatransformers
            


            ->add('endDate',TextType::class)
          //  ->add('createdAt')
          //  ->add('amount')
            ->add('comment')
          //  ->add('booker')
           // ->add('ad')
        ;


    $builder->get('startDate')
            ->addModelTransformer($this->transformer);
    $builder->get('endDate')
            ->addModelTransformer($this->transformer);



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
