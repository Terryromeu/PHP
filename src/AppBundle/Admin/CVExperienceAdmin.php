<?php

namespace AppBundle\Admin;

use AppBundle\Entity\CVExperience;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CVExperienceAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'cvexperience';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('annee', IntegerType::class)
            ->add('periode', TextType::class)
            ->add('intitule', TextType::class)
            ->add('ville', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('annee')
            ->add('periode')
            ->add('intitule')
            ->add('ville');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('intitule')
            ->add('annee')
            ->add('periode')
            ->add('ville');
    }

    public function toString($object)
    {
        return $object instanceof CVExperience
            ? $object->getIntitule()
            : 'Expérience'; // shown in the breadcrumb on the create view
    }

}