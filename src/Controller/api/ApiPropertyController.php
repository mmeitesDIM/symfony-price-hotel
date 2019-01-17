<?php

namespace App\Controller\api;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiPropertyController extends AbstractController {

    /**
     * @Route("/properties", name="api_properties", methods={"GET"})
     */
    public function getApiPropertiesAction(PropertyRepository $propertyRepository) {
        $properties = $propertyRepository->findAll();

        if (empty($properties)) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $formatted = [];
        foreach ($properties as $property) {
            $formatted[] = [
                'id' => $property->getId(),
                'name' => $property->getName(),
                'address' => $property->getAddress(),
                'postalCode' => $property->getPostalCode(),
                'city' => $property->getCity(),
                'country' => $property->getCountry(),
                'bedNumber' => $property->getBedNumber(),
                'surface' => $property->getSurface(),
                'avg_rated' => $property->getAvgRated(),
            ];
        }

        return new JsonResponse($formatted, Response::HTTP_NOT_FOUND);
    }

    /**
     * @Route("/property/{id}", name="api_property_id", methods={"GET"})
     */
    public function getApiPropertyAction(PropertyRepository $propertyRepository, $id) {
        $property = $propertyRepository->findOneBy(array('id' => $id));

        if (empty($property)) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $formatted[] = [
            'id' => $property->getId(),
            'name' => $property->getName(),
            'address' => $property->getAddress(),
            'postalCode' => $property->getPostalCode(),
            'city' => $property->getCity(),
            'country' => $property->getCountry(),
            'bedNumber' => $property->getBedNumber(),
            'surface' => $property->getSurface(),
            'avg_rated' => $property->getAvgRated(),
        ];
        return new JsonResponse($formatted, Response::HTTP_NOT_FOUND);
    }

}