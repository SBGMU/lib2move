<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Entity\Location;
use App\Form\VehiculeType;
use App\Form\LocationType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location")
     */
    /**
     * @Route("/location/{id}", name="location")
     * @ParamConverter("location", options={"mapping"={"id"="id"}})
     */
    public function index($id,Request $request, VehiculeRepository $vehiculeRepository)
    {

        $location = new Location();
        $form = $this->createForm(LocationType:: class, $location);
        $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);     
        $form->handleRequest($request);
            if (!$vehicule) {
                throw $this->createNotFoundException('No video found for id '.$id);
            }

            if ($form->isSubmitted() && $form->isValid()){
               
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($location);
                $entityManager->flush();
                
            }
        return $this->render('location/index.html.twig', [

            'vehicule' => $vehicule, 'form' => $form->createView()
    
        ]);
    }
}
