<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AnimalRepository;

class ViewAnimalController extends AbstractController
{
    #[Route('/view/animal', name: 'app_view_animal')]
    public function index(AnimalRepository $servicesRepository): Response
    {
        $animals = $servicesRepository->findAll();

        return $this->render('view_animal/index.html.twig', [
            'animals' => $animals,
        ]);
    }
}
