<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
class CustomerType extends AbstractType{


public function buildForm(FormBuilderInterface $builder, array $options)
{

    $builder
    ->add('name')
    ->add('account_no')
    ->add('registered_date');
}

}


?>