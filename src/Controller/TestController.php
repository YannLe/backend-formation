<?php

namespace App\Controller;

use App\Repository\PersonnageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(PersonnageRepository $personnageRepository): JsonResponse
    {
        $personnages = $personnageRepository->findAll();
        return $this->json([
            'personnage' => $personnages
        ]);
    }
}
