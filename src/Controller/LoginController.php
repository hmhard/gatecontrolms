<?php
namespace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\AdminController;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends AbstractController{



   
/** 
* @Route("login", name="login")
*/
    public function authenticate(EntityManagerInterface $em, Request $request)
    {
        $session = new Session();
        $session->start();
     $users=new Users();
     
        $form=$this->createForm(UserType::class);
    
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
       
             $data=$form->getData();
           //  dd($data);
          $users->setUsername($data['username']);
           $user = $this->getDoctrine()
           ->getRepository(Users::class)
           ->findOneBy([
            'username' => $data['username'],
            'password' => $data['password'],
        ]);
    

        if(!$user){
          
           
       
      $this->createNotFoundException('Username And Password not match');
    //    if($session->get('user_name')!='chaltu') {
    //     $this->addFlash("danger",'UserName And Passowrd Not Correct');
    //  return $this->redirectToRoute('login');
       
        }
    
        else{


            $session->set('user_name', $data['username']);
     
            // if($session->get('user_name')!='chaltu') {
            //     $this->addFlash("danger",'UserName And Passowrd Not Correct');
            //  return $this->redirectToRoute('login');
               
            //     }
            
            // set and get session attributes
         
            
           // dd($session->get('user_name'));
            return $this->render("authorized/index.twig", [
               'users_name'=>$session->get('user_name') 
            ]);   
            

        }

           //dd($user);
            // $custom=new Customers();
       
           //  $custom->setName($data['name']);
            // $custom->setAccountNo($data['account_no']);
           //  $custom->setRegisteredDate(new \DateTime($data['registered_date']));
       
           //  $em->persist($custom);
          //   $em->flush();
       
          
       
            
       
     

    
}   
    return $this->render("login.twig",
    [ 'form'=>$form->createView()]);

}



/**
 * @Route("loggedin", name="loggedin")
 */
public function homed()
{
    $this->render('authorized/index.twig');
}



/**
 * @Route("logout", name="logout")
 */
public function logout()
{
   $session= new Session();
   $session->start();
   $session->invalidate();

    return $this->render('pages/admin.html.twig');
}


}
?>