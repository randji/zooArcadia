<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ServicesRepository;

class ViewServicesController extends AbstractController
{
    #[Route('/view/services', name: 'app_view_services')]
    public function index(ServicesRepository $servicesRepository): Response
    {
        $services = $servicesRepository->findAll();

        return $this->render('view_services/index.html.twig', [
            'services' => $services,
        ]);
    }
}
