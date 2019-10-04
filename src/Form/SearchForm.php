<?php
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class SearchForm extends AbstractType{


public function buildForm(FormBuilderInterface $builder, array $options)
{

    $builder
    ->add('user_id',TextType::class,['label'=>'User Id'])
    ->add('search',ButtonType::class,['label'=>'Search','attr' => ['class' => 'search_user, btn-info']]);
  
    
}

}


?>