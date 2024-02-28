<?php

namespace App\Controller;

use App\Helper\PersonnageHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(PersonnageHelper $personnageHelper): JsonResponse
    {
        $personnages = $personnageHelper->getNewPersonnage();
        return $this->json([
            'personnage' => $personnages
        ]);
    }
}
