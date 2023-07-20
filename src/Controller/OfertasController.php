<?php

namespace App\Controller;

use App\Entity\Ofertas;
use App\Form\OfertasType;
use App\Repository\OfertasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ofertas')]
class OfertasController extends AbstractController
{
    #[Route('/', name: 'app_ofertas_index', methods: ['GET'])]
    public function index(OfertasRepository $ofertasRepository): Response
    {
        return $this->render('ofertas/index.html.twig', [
            'ofertas' => $ofertasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ofertas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $oferta = new Ofertas();
        $form = $this->createForm(OfertasType::class, $oferta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($oferta);
            $entityManager->flush();

            return $this->redirectToRoute('app_ofertas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ofertas/new.html.twig', [
            'oferta' => $oferta,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ofertas_show', methods: ['GET'])]
    public function show(Ofertas $oferta): Response
    {
        return $this->render('ofertas/show.html.twig', [
            'oferta' => $oferta,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ofertas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ofertas $oferta, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OfertasType::class, $oferta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ofertas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ofertas/edit.html.twig', [
            'oferta' => $oferta,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ofertas_delete', methods: ['POST'])]
    public function delete(Request $request, Ofertas $oferta, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oferta->getId(), $request->request->get('_token'))) {
            $entityManager->remove($oferta);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ofertas_index', [], Response::HTTP_SEE_OTHER);
    }
    
}
