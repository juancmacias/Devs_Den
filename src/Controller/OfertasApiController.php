<?php

namespace App\Controller;

use App\Entity\JobPositions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ofer')]
class OfertasApiController extends AbstractController
{
    // list of all jobs
    #[Route('/jobpositions', name: 'app_listado', methods:'GET')]
    public function index(SerializerInterface $serializer): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Ofertas = $entityManager->getRepository(JobPositions::class)->findAll();
        $json = $serializer->serialize($Ofertas, 'json');
        return new Response($json, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
    // detail only one job
    #[Route('/{id}', name: 'app_listado_id', methods:'GET')]
    public function edit(Request $request, SerializerInterface $serializer, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Ofertas = $entityManager->getRepository(JobPositions::class)->findOneById($id);
        $json = $serializer->serialize($Ofertas, 'json');
        return new Response($json, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}
