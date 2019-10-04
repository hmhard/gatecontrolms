<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Report;
use App\Entity\SISUser;
use App\Form\SearchForm;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\JsonDecoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;


class AdminController extends AbstractController{

/**
 * @Route("admin_index", name="admin_index")
 */
public function home()
{
   $comments=["my comment ", "yours and others"];


   return $this->render("authorized/authorized.html.twig",['title'=>'welcome', 'comments'=>$comments]);
}




 /**
  * @Route("search", name="search")
  */
  public function searchEmployee(){
 
    //$form=$this->createForm(SearchForm::class);


   $session=new Session();
   $session->start();
   $user_name=$session->get('user_name');
    if(empty($user_name)) {
        $this->addFlash("danger",'UserName And Passowrd Not Correct');
     return $this->redirectToRoute('login'
     
    );
        

    }  
    return $this->render("authorized/index.twig",
       [
         
           'users_name'=>$user_name,
    ]);
 }

/**
 * @Route("fetch_user", name="fetch_user", methods={"get"})
 */
public function fetch_user(EntityManagerInterface $em, Request $request)
{
    $data =$request->query->get('id');
    $employee=new Employee();
    $report=new Report();
    $sisuser =new SISUser();

    $filesystem = new Filesystem();

    $session=new Session();



    



    $status='0';

    $repository = $this->getDoctrine()->getRepository(Employee::class);
    $repository2 = $this->getDoctrine()->getRepository(Report::class);
    $repository3 = $this->getDoctrine()->getRepository(SISUser::class);


    $entityManager = $this->getDoctrine()->getManager();
    $update_report = $entityManager->getRepository(Report::class)->findOneBy(
        ['user_id' => $data]
        
    );
    if($update_report){
    $update_report->setLastSeen(new \DateTime());
    $entityManager->flush();
    }


  // to get user information  
   $emp=$repository->findOneBy([
       'employee_id'=>$data
   ]);
  
   // to get last update and report
   $emp2=$repository2->findBy(
    ['user_id' => $data]
    
);


$empsis=$repository3->findOneBy([
    'user_id'=>$data
]);
// to get sis user info

   if($emp){

   $employee->setEmployeeId($emp->getEmployeeId());
   $employee->setFirstName($emp->getFirstName());
   $employee->setLastName($emp->getLastName());
   $employee->setPhoneNo($emp->getPhoneNo());
   $employee->settype($emp->gettype());
   $employee->setImageUrl($emp->getImageUrl());
   $employee->setRegisteredAt($emp->getRegisteredAt());
   $employee->setGender($emp->getGender());
   





   try {
    
   $date=new DateTime();
    $filesystem->appendToFile('logs/'.date("Y-m"),"\n");
    $filesystem->appendToFile('logs/'.date("Y-m"),$date->format('Y-m-d H:i:s A').", ".$data.", "."in".", ". $session->get('user_name'));
  
} catch (IOExceptionInterface $exception) {
  
}


   if($empsis){

  $sisuser->setUserId($empsis->getUserId());
  $sisuser->setUpdateNumber($empsis->getUpdateNumber());
  $sisuser->setLastUpdate($empsis->getLastUpdate());

     if($sisuser->getUpdateNumber()==0){
         $status='1';
     }  
     else
     { 
         
    $re = '/\d{1,}$/i';
    

preg_match($re, $data, $matches, PREG_OFFSET_CAPTURE, 0);

if($matches[0][0]==$sisuser->getUpdateNumber()){
        
        $status='1';
    
    }
    else{
       // var_dump($matches[0][0]);
        $status='0';
    }
} 
   }


   if($emp2){

    //$report->setLastSeen(new \DateTime(sprintf('-%d days', rand(1, 100))));

    
        $count=0;
     foreach($emp2 as $e){
     $count+=1;
    }
     $report->setDescription($emp2[0]->getDescription());
    
   }
   else{
    $report->setDescription('0');

   }

  $response=$employee->getEmployeeId().'**'.$employee->getFirstName().
  '**'.$employee->getLastName().'**'.$employee->getImageUrl()
  .'**'.$employee->getPhoneNo().'**'.$employee->getType().'**'
  .$employee->getRegisteredAt()->format('Y-m-d H:i:s')
  .'**'.$employee->getGender().'**'.$report->getDescription().'**'.$status;
  
  return new Response($response);

   }
   else{
    return new Response("1");
   }
}


 
 /**
  * @Route("list_down", name="list_down")
  */
  public function list_down(EntityManagerInterface $em){

    $rep=$em->getRepository(Employee::class)->findAll();
 
 
  
    
     return $this->render('authorized/displayEmployee.html.twig',['employees'=>$rep]);
 
  }



 /**
  * @Route("report_issue", name="report_issue")
  */
  public function report_issue(EntityManagerInterface $em, Request $request){

    $report=new Report();


 
    
    $report->setUserId($request->query->get('employee_id'));
    $report->setDescription($request->query->get('data'));
    $report->setReportDate(new \DateTime(sprintf('-%d days', rand(1, 100))));
    $report->setLastSeen(new \DateTime(sprintf('-%d days', rand(1, 100))));

    $em->persist($report);
    $em->flush();

    return new Response("registered");

 }



}

?>