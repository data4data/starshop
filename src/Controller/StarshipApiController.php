<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(NormalizerInterface $normalizer, StarshipRepository $repository): JsonResponse
    {
        // dd($normalizer);

        $starships = $repository->findAll();

        //      $starships =  $normalizer->normalize($starships);
        //      return new JsonResponse($starships);

        return $this->json($starships);
    }
}
