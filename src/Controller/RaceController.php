<?php

namespace App\Controller;

use App\Entity\Race;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RaceController extends AbstractController
{
    #[Route('/create-race', name: 'app_test')]
    public function index(
        EntityManagerInterface $entityManager,
        Request                $request,
        ValidatorInterface     $validator
    ): JsonResponse
    {
        $name        = $request->get('name');
        $description = $request->get('description');
        $race        = new Race();
        $race
            ->setNom($name)
            ->setDescription($description);
        $violations = $validator->validate($race);
        if (count($violations) > 0) {
            $errors = [];
            foreach ($violations as $violation) {
                $errors[] = $violation->getMessage();
            }
            return $this->json(
                $errors,
                422
            );
        }
        $entityManager->persist($race);
        $entityManager->flush();

        return $this->json([
            'race' => $race
        ], 201);
    }
}
