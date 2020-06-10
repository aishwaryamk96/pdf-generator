<?php
/**
 * Created by PhpStorm.
 * User: techjini
 * Date: 09-06-2020
 * Time: 21:01
 */

namespace App\Admin;


use phpDocumentor\Reflection\Types\Boolean;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TemplateAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Template', ['class' => 'col-md-10'])
                ->add('name', TextType::class,
                    array("label"=>"Template Name", 'attr' => ['maxlength' => 30]))
                ->add('modifiers', TextType::class,
                    array("label"=>"Modifiers", "required"=>false, 'attr' => ['maxlength' => 255,'placeholder'=> 'ex: NAME,EMAIL']))
                ->add('content', TextareaType::class,
                    array("label"=>"PdF Content", "required"=>false, 'attr' => ['class' => 'tinymce','placeholder'=> 'HTML format']))
                ->add('isActive', CheckboxType::class,
                array("label"=>"Enable","required"=>false))
            ->end();

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('modifiers');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('modifiers');
        $listMapper->addIdentifier('isActive');
    }
    protected function configureQuery(ProxyQueryInterface $query): ProxyQueryInterface
    {
        return parent::configureQuery($query); // TODO: Change the autogenerated stub
    }

}