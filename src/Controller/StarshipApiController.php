<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(NormalizerInterface $normalizer, StarshipRepository $repository): JsonResponse
    {
        // dd($normalizer);

        $starships = $repository->findAll();

        //      $starships =  $normalizer->normalize($starships);
        //      return new JsonResponse($starships);

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository): Response
    {
        $starship = $repository->find($id);
        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }
        return $this->json($starship);
    }
}
