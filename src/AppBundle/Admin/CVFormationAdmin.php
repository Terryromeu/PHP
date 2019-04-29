<?php

namespace AppBundle\Admin;

use AppBundle\Entity\CVFormation;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CVFormationAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'cvformation';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('diplome', TextType::class)
            ->add('particularite', TextType::class)
            ->add('periode', TextType::class)
            ->add('ville', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('diplome')
            ->add('particularite')
            ->add('periode')
            ->add('ville');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('diplome')
            ->add('particularite')
            ->add('periode')
            ->add('ville');
    }

    public function toString($object)
    {
        return $object instanceof CVFormation
            ? $object->getDiplome()
            : 'Formation'; // shown in the breadcrumb on the create view
    }

}