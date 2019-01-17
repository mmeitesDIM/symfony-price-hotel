<?php

namespace App\Controller;

use App\Entity\FullHouse;
use App\Form\FullHouseType;
use App\Repository\FullHouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fullhouse")
 */
class FullHouseController extends AbstractController
{
    /**
     * @Route("/", name="full_house_index", methods={"GET"})
     */
    public function index(FullHouseRepository $fullHouseRepository): Response
    {
        return $this->render('full_house/index.html.twig', [
            'full_houses' => $fullHouseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="full_house_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fullHouse = new FullHouse();
        $form = $this->createForm(FullHouseType::class, $fullHouse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fullHouse);
            $entityManager->flush();

            return $this->redirectToRoute('full_house_index');
        }

        return $this->render('full_house/new.html.twig', [
            'full_house' => $fullHouse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="full_house_show", methods={"GET"})
     */
    public function show(FullHouse $fullHouse): Response
    {
        return $this->render('full_house/show.html.twig', [
            'full_house' => $fullHouse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="full_house_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FullHouse $fullHouse): Response
    {
        $form = $this->createForm(FullHouseType::class, $fullHouse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('full_house_index', [
                'id' => $fullHouse->getId(),
            ]);
        }

        return $this->render('full_house/edit.html.twig', [
            'full_house' => $fullHouse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="full_house_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FullHouse $fullHouse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fullHouse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fullHouse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('full_house_index');
    }
}
