<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Image;
use AppBundle\Entity\Realisations;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RealisationsAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'realisations';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class)
            ->add('langage', TextType::class)
            ->add('description', TextareaType::class)
            ->add('annee', IntegerType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
            ->add('langage')
            ->add('description')
            ->add('annee');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
            ->add('langage')
            ->add('description')
            ->add('annee');
    }

    public function toString($object)
    {
        return $object instanceof Realisations
            ? $object->getTitle()
            : 'Realisations'; // shown in the breadcrumb on the create view
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Realisations::class,
        ));
    }

}