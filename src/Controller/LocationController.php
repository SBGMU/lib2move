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
use Dompdf\Dompdf;
use Dompdf\Options; 
use Symfony\Component\Validator\Constraints\DateTime;

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
        $dt = new DateTime();
        //$dt->format('Y-m-d H:i:s');
        $location = new Location();
        ///$vehicule = new Vehicule();
        $user =  new User();
        $form = $this->createForm(LocationType:: class, $location);
        $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);  
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        // Retrieve the HTML generated in our twig file

        
        $form->handleRequest($request);
            if (!$vehicule) {
                throw $this->createNotFoundException('No vehicule found for id '.$id);
            }

            if ($form->isSubmitted() && $form->isValid()){

                $se = $request->request->get('location');
                $dat1 = $location->getDateDebut();
                $dat2 = $location->getDateFin();
                $Prix_loc = $vehicule->getPrixLocation();
                $interval = $dat1->diff($dat2);
                $date3 = $interval->format('%R%a');
            
                $prix_total = $Prix_loc * $date3;

                    $location->setDateLocation(new \DateTime());
                    $location->setUser($user->getId());
                    $location->setPrixTotal($prix_total);
$location->setIdVehicule($vehicule);
                    
                    
                    
///////vehicule
                   // $vehicule->setStatus(1);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($location);
                $entityManager->flush();
                
            }
        
            
        return $this->render('location/index.html.twig', [

            'vehicule' => $vehicule, 'form' => $form->createView()
    
        ]);
    }
}
