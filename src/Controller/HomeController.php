<?php
namespace App\Controller;

use App\Entity\Customers;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ExpressionLanguage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Doctrine\ORM\EntityManagerInterface;



class HomeController extends AbstractController{

/** 
* @Route("homepage", name="homepage")
*/
public function index(){

   $comments=["my comment ", "yours and others"];


   return $this->render("pages/admin.html.twig",['title'=>'welcome', 'comments'=>$comments]);
 }


 /**
  * @Route("registering", name="registering")
  */
 public function registering(EntityManagerInterface $em, Request $request){
 
    $form=$this->createForm(CustomerType::class);

   
 

    $form->handleRequest($request);

 if( $form->isSubmitted() && $form->isValid()){

      $data=$form->getData();
      
      $custom=new Customers();

      $custom->setName($data['name']);
      $custom->setAccountNo($data['account_no']);
      $custom->setRegisteredDate(new \DateTime($data['registered_date']));

      $em->persist($custom);
      $em->flush();

   

      $rep=$em->getRepository(Customers::class)->findAll();

    $this->addFlash("success",'Registered Successfully');
     return $this->redirectToRoute('display',
      ['customers'=>$rep]
    );


   } 
    //$this->redirectToRoute('registering');

    return $this->render("pages/registering.twig",   ['form'=>$form->createView(),
    ]);
 }

 /**
  * @Route("register", name="register")
  */
 public function register(EntityManagerInterface $em){

    $cust=new Customers();
    
    $cust->setName('abebe');
    $cust->setAccountNo('5675675');
    $cust->setRegisteredDate(new \DateTime(sprintf('-%d days', rand(1, 100))));
 
    $em->persist($cust);
    $em->flush();

    return new Response("registered");

 }

 /**
  * @Route("display", name="display")
  */
 public function display(EntityManagerInterface $em){

   $rep=$em->getRepository(Customers::class)->findAll();


 
   
    return $this->render('pages/display.twig',['customers'=>$rep]);

 }

  /**
     * @Route("/aboutus", name="about-us")
     */
public function aboutus(){
   $comments=["my comment ", "yours and others"];
 $language=new ExpressionLanguage();
    $res=$language->evaluate('10+5');
 
  return $this->render("pages/aboutus.twig", ['result'=>$res]);
}



}

?>