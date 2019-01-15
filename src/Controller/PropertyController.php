<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {

    /**
     * @Route("/properties", name="property")
     */
    public function index() {

        $entityManager = $this->getDoctrine()->getManager();

        $property = new Property();
        $property->setName("Annecy");
        $property->setCity("Annecy");
        $property->setAddress("Annecy");
        $property->setCountry("Annecy");
        $property->setPostalCode("Annecy");

        $entityManager->persist($property);

        $entityManager->flush();

        return $this->render(
            'property/index.html.twig',
            ['controller_name' => 'PropertyController',]
        );
    }

}
