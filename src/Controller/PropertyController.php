<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends AbstractController
{

    public function index(Request $request)
    {

        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($property);
            $entityManager->flush();


        }

        return $this->render('property/index.html.twig', [
                'form' => $form->createView(),
            ]
        );
    }

    public function showDb()
    {
        $properties = $this->getDoctrine()
            ->getRepository(Property::class)
            ->findAll();

        $finalName = "";

        foreach ($properties as $property) {
            $name = $property->getName();
        }

        return $this->render(
            'property/findAll.html.twig',
            ['base_content' => $properties]
        );
    }

}
