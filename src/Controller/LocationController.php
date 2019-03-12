<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Entity\Location;
use App\Form\VehiculeType;
use App\Form\LocationType;
use App\Repository\VehiculeRepository;
use App\Repository\LocationRepository;
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
                
               return $this->redirectToRoute('paiementEffectue', array('id' => $location->getId()));
            }
        
            
        return $this->render('location/index.html.twig', ['vehicule' => $vehicule, 'form' => $form->createView()]);
    }

    /**
     * @Route("/paiementFait/{id}", name="paiementFait")
     * @ParamConverter("paiementFait", options={"mapping"={"id"="id"}})
     */
    public function paiementFait($id,Request $request, LocationRepository $locationRepository)
    {
        $location = $this->getDoctrine()->getRepository(Location::class)->find($id); 
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('vehicule/paiementEffectue.html.twig', array(
            'location' => $location));
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render('vehicule/paiementEffectue.html.twig', array(
            'location' => $location,
        ));

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("vehicule/paiementEffectue.html.twig", [
            "Attachment" => false
        ]);
        // return $this->render('vehicule/paiementEffectue.html.twig', array(
        //     'vehicule' => 'vehicule',
        // ));

    } 
    
    
    /**
     * @Route("/paiementEffectue/{id}", name="paiementEffectue")
     * @ParamConverter("paiementEffectue", options={"mapping"={"id"="id"}})
     */
    public function paiementEffectue($id, Request $request, VehiculeRepository $vehiculeRepository)
    {
        $location = $this->getDoctrine()->getRepository(Location::class)->find($id);
        return $this->render('vehicule/paiementEffectue.html.twig', array(
            'location' => $location,
        ));

    } 
}
