<?php

namespace CelinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ColorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('colorNameEs', null, array('label' => '颜色名称西语'))
            ->add('colorNameEn', null, array('label' => '颜色名称英语'))
            ->add('colorFoto', FileType::class, array(
                'label' => '颜色图片',
                'data_class' => null,
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CelinaBundle\Entity\Color'
        ));
    }
}
