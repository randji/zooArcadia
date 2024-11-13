<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewHabitatController extends AbstractController
{
    #[Route('/view/habitat', name: 'app_view_habitat')]
    public function index(): Response
    {
        return $this->render('view_habitat/index.html.twig', [
            'controller_name' => 'ViewHabitatController',
        ]);
    }
}
