<?php

namespace App\Controller;

use App\Entity\ShareRoom;
use App\Form\ShareRoomType;
use App\Repository\ShareRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/shareroom")
 */
class ShareRoomController extends AbstractController
{
    /**
     * @Route("/", name="share_room_index", methods={"GET"})
     */
    public function index(ShareRoomRepository $shareRoomRepository): Response
    {
        return $this->render('share_room/index.html.twig', [
            'share_rooms' => $shareRoomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="share_room_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $shareRoom = new ShareRoom();
        $form = $this->createForm(ShareRoomType::class, $shareRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($shareRoom);
            $entityManager->flush();

            return $this->redirectToRoute('share_room_index');
        }

        return $this->render('share_room/new.html.twig', [
            'share_room' => $shareRoom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="share_room_show", methods={"GET"})
     */
    public function show(ShareRoom $shareRoom): Response
    {
        return $this->render('share_room/show.html.twig', [
            'share_room' => $shareRoom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="share_room_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ShareRoom $shareRoom): Response
    {
        $form = $this->createForm(ShareRoomType::class, $shareRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('share_room_index', [
                'id' => $shareRoom->getId(),
            ]);
        }

        return $this->render('share_room/edit.html.twig', [
            'share_room' => $shareRoom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="share_room_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ShareRoom $shareRoom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$shareRoom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($shareRoom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('share_room_index');
    }
}
