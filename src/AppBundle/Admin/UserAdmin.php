<?php
/**
 * Created by PhpStorm.
 * User: simontoulouze
 * Date: 18/12/2017
 * Time: 21:50
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use AppBundle\Entity\Image;
use AppBundle\Entity\User;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'user';


    protected function configureFormFields(FormMapper $formMapper)
        {

            $roles = $this->getConfigurationPool()->getContainer()->getParameter('security.role_hierarchy.roles');
            $rolesChoices = self::flattenRoles($roles);

            $formMapper->add('username', TextType::class)
                ->add('email', TextType::class)
                ->add('roles', 'choice', array(
                           'choices'  => $rolesChoices,
                           'multiple' => true
                ))
                ->add('image', 'sonata_type_admin', [
                    'delete' => false,
                    'label' => 'Image (JPEG or PNG file)'
                ])
                ->add('enabled', CheckboxType::class, [
                    'required' => false
                ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')
            ->add('email')
            ->add('roles')
            ->add('enabled');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username')
            ->add('email')
            ->add('roles')
            ->add('enabled');
    }

    public function toString($object)
    {
        return $object instanceof User
        ? $object->getUsername() : 'User';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => User::class,
        ));
    }



    ///////////////////  DÉFINITION DES RÔLES ///////////////////
    protected static function flattenRoles($rolesHierarchy)
    {
        $flatRoles = array();
        foreach($rolesHierarchy as $roles) {

            if(empty($roles)) {
                continue;
            }

            foreach($roles as $role) {
                if(!isset($flatRoles[$role])) {
                    $flatRoles[$role] = $role;
                }
            }
        }

        return $flatRoles;
    }




        ///////////////////  UPLOAD IMAGE ///////////////////
    public function prePersist($page)
    {
        $this->manageEmbeddedImageAdmins($page);
    }

    public function preUpdate($page)
    {
        $this->manageEmbeddedImageAdmins($page);
    }

    private function manageEmbeddedImageAdmins($page)
    {
        // Cycle through each field
        foreach ($this->getFormFieldDescriptions() as $fieldName => $fieldDescription) {
            // detect embedded Admins that manage Images
            if ($fieldDescription->getType() === 'sonata_type_admin' &&
            ($associationMapping = $fieldDescription->getAssociationMapping()) &&
            $associationMapping['targetEntity'] === 'AppBundle\Entity\Image') {
                $getter = 'get'.$fieldName;
                $setter = 'set'.$fieldName;

                /** @var Image $image */
                $image = $page->$getter();

                if ($image) {
                    if ($image->getFile()) {
                        // update the Image to trigger file management
                        $image->refreshUpdated();
                    } elseif (!$image->getFile() && !$image->getFilename()) {
                        // prevent Sf/Sonata trying to create and persist an empty Image
                        $page->$setter(null);
                    }
                }
            }
        }
    }
}