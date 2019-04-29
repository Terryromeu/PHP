<?php
/**
 * Created by PhpStorm.
 * User: simontoulouze
 * Date: 21/12/2017
 * Time: 17:20
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Commentaire;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'commentaire';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('published', CheckboxType::class, [
                'required' => false
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id')
            ->add('date')
            ->add('user')
            ->add('content')
            ->add('article')
            ->add('published');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('date')
            ->add('user')
            ->add('content')
            ->add('article')
            ->add('published');
    }

    public function toString($object)
    {
        return $object instanceof Commentaire
            ? $object->getId()
            : 'Commentaire'; // shown in the breadcrumb on the create view
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Commentaire::class,
        ));
    }
}