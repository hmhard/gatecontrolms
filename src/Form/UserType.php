<?php
namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType{


public function buildForm(FormBuilderInterface $builder, array $options)
{

    $builder
    ->add('username')
    ->add('password', PasswordType::class);
}

// public function configureOptions(OptionsResolver $resolver)
// {
//     $resolver->setDefaults([
//         'data_class'      => Users::class,
       
//         'csrf_protection' => true,
//         // the name of the hidden HTML field that stores the token
//         'csrf_field_name' => '_token',
//         // an arbitrary string used to generate the value of the token
//         // using a different string for each form improves its security
//         'csrf_token_id'   => 'task_item',
//     ]);
// }

}


?>