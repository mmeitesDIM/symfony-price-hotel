<?php

namespace App\Controller;

use App\Repository\FullHouseRepository;
use App\Repository\PrivateRoomRepository;
use App\Repository\ShareRoomRepository;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page",  methods={"GET"})
     */
    public function index()
    {

//        $fullHouserepo = new FullHouseRepository();

        $response = $this->forward('App\Controller\FullHouseController::index', [/*$fullHouserepo*/]);
        var_dump($response);


        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
