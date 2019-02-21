<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class VehiculeController extends Controller
{
    /**
     * @Route("/vehicule", name="vehicule")
     */
    public function index(Request $request, VehiculeRepository $vehiculeRepository)
    {
        $vehicule = new Vehicule();
        $form =  $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $file = $vehicule->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$fileName);
            $vehicule->setImage($fileName);
            /*
            $message = (new \Swift_Message('You Got Mail!'))
                         ->setFrom($contactFormData['from'])
                          ->setTo('our.own.real@email.address')
                         ->setBody(
                              $contactFormData['message'],
                              'text/plain'
                       )
                   ;*/
            
                      //$mailer->send($message);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);
            $entityManager->flush();
        }

        return $this->render('vehicule/index.html.twig', array(
            'form' => $form->createView(),
            'vehicule' => $vehicule,
        ));
        
        
    }

     /**
     * @Route("/listeVehicule", name="listeVehicule")
     */

    public function afficheVehicule(Request $request, VehiculeRepository $vehiculeRepository)
    {
        $vehicule = new Vehicule();
        $form =  $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        $vehicule = $vehiculeRepository->findBy(array('Status' => '1'));

        return $this->render('vehicule/listeVehicule.html.twig', array(
            'vehicule' => 'vehicule',
        ));

        
    }

    /**
     * @Route("/paiementEffectue", name="paiementEffectue")
     */

    public function paiementEffectue(Request $request, VehiculeRepository $vehiculeRepository)
    {

        return $this->render('vehicule/paiementEffectue.html.twig', array(
            'vehicule' => 'vehicule',
        ));

    } 
    /**
     * @Route("/DetailVehicule/{id}", name="DetailVehicule" , methods={"GET"})
     */
    public function DetailVehicule( Vehicule $vehicule):Reponse
    {
        
        return $this->render('vehicule/Detail.html.twig', array(
            'vehicule' => $vehicule,
        ));

        
    }
    /**
     * @Route("/DetailVehicule/{id}", name="DetailVehicule" , methods={"GET"})
     */
    public function DetailVehicule( Vehicule $vehicule):Reponse
    {
        
        return $this->render('vehicule/Detail.html.twig', array(
            'vehicule' => $vehicule,
        ));

        
    }
}