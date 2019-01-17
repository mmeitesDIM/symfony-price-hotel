<?php

namespace App\Controller;

use App\Entity\PrivateRoom;
use App\Form\PrivateRoomType;
use App\Repository\PrivateRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/privateroom")
 */
class PrivateRoomController extends AbstractController
{
    /**
     * @Route("/", name="private_room_index", methods={"GET"})
     */
    public function index(PrivateRoomRepository $privateRoomRepository): Response
    {
        return $this->render('private_room/index.html.twig', [
            'private_rooms' => $privateRoomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="private_room_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $privateRoom = new PrivateRoom();
        $form = $this->createForm(PrivateRoomType::class, $privateRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($privateRoom);
            $entityManager->flush();

            return $this->redirectToRoute('private_room_index');
        }

        return $this->render('private_room/new.html.twig', [
            'private_room' => $privateRoom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="private_room_show", methods={"GET"})
     */
    public function show(PrivateRoom $privateRoom): Response
    {
        return $this->render('private_room/show.html.twig', [
            'private_room' => $privateRoom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="private_room_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PrivateRoom $privateRoom): Response
    {
        $form = $this->createForm(PrivateRoomType::class, $privateRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('private_room_index', [
                'id' => $privateRoom->getId(),
            ]);
        }

        return $this->render('private_room/edit.html.twig', [
            'private_room' => $privateRoom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="private_room_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PrivateRoom $privateRoom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$privateRoom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($privateRoom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('private_room_index');
    }
}
