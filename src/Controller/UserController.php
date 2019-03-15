<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Entity\Location;
use App\Form\LoginUserType;
use App\Form\RegisterUserType;
use App\Repository\UserRepository;
use App\Repository\VehiculeRepository;
use App\Repository\LocationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, UserRepository $userRepository)
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        $users = $userRepository->findAll();

        return $this->render('security/admin.html.twig', array(

                'form'=>$form->createView(),
                
                'users'=>$users
            )

        );
    }

      /**
     * @Route("/register/admin", name="register_admin")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder,AuthenticationUtils $authenticationUtils)
    {
        $user = new User();
        $form = $this->createForm(RegisterUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles(["ROLES_ADMIN"]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            //$logger->info('User registered now !');
            //$this->addFlash('notice', 'Your changes were saved!');
            //$event = new UserRegisteredEvent($user);
            //$eventDispatcher->dispatch(UserRegisteredEvent::NAME,$event);

            //return $this->redirectToRoute('video');
        }
        return $this->render('user/RegisterAdmin.html.twig', [
            'controller_name' => 'SecurityController',
            'error' => $authenticationUtils ->getLastAuthenticationError(),
            'form' => $form->createView()
        ]);
            
    }
     
    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request, VehiculeRepository $vehiculeRepository)
    {

        $vehicule = $vehiculeRepository->findBy(
            [ 'Status' => 1 ]
        );
        
        return $this->render('user/Home.html.twig', array(
             'vehicule' => $vehicule,
         ));
            
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, VehiculeRepository $vehiculeRepository)
    {
        
        return $this->render('user/Contact.html.twig', array(
             'vehicule' => 'vehicule',
         ));
            
    }

    /**
     * @Route("/galerie", name="galerie")
     */
    public function galerie(Request $request, VehiculeRepository $vehiculeRepository)
    {
        
        return $this->render('user/Galerie.html.twig', array(
             'vehicule' => 'vehicule',
         ));
            
    }

     /**
     * @Route("/CommandeClient", name="CommandeClient")
     */
    public function CommandeClient(Request $request, LocationRepository $locationRepository)
    {
        $location = $locationRepository->findBy(
             ['id'=> $this->getUser()->getId()]
        );

       
        
        return $this->render('user/CommandeClient.html.twig', array(
            'location' => $location,
         ));
            
    }

    /**
     * @Route("/ListeClient", name="ListeClient")
     */
    public function ListeClient(Request $request, UserRepository $userRepository)
    {
        $user = $userRepository->findAll();

        //dd($location);
        
        return $this->render('user/listeClient.html.twig', array(
            'location' => $user,
         ));
            
    }

    public function EmailRetard( $id)
    {
        /*$message = (new \Swift_Message('You Got Mail!'))
                         ->setFrom($contactFormData['from'])
                          ->setTo('our.own.real@email.address')
                         ->setBody(
                              $contactFormData['message'],
                              'text/plain'
                       )
                   ;
            
                      $mailer->send($message);
       
        */
    }
    
}
