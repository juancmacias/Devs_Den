<?php

namespace App\Controller;

use App\Entity\JobPositions;
use App\Form\JobPositionsType;
use App\Repository\JobPositionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/job/positions')]
class JobPositionsController extends AbstractController
{
    #[Route('/', name: 'app_job_positions_index', methods: ['GET'])]
    public function index(JobPositionsRepository $jobPositionsRepository): Response
    {
        return $this->render('job_positions/index.html.twig', [
            'job_positions' => $jobPositionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_job_positions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jobPosition = new JobPositions();
        $form = $this->createForm(JobPositionsType::class, $jobPosition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jobPosition);
            $entityManager->flush();

            return $this->redirectToRoute('app_job_positions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('job_positions/new.html.twig', [
            'job_position' => $jobPosition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_job_positions_show', methods: ['GET'])]
    public function show(JobPositions $jobPosition): Response
    {
        return $this->render('job_positions/show.html.twig', [
            'job_position' => $jobPosition,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_job_positions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JobPositions $jobPosition, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JobPositionsType::class, $jobPosition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_job_positions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('job_positions/edit.html.twig', [
            'job_position' => $jobPosition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_job_positions_delete', methods: ['POST'])]
    public function delete(Request $request, JobPositions $jobPosition, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobPosition->getId(), $request->request->get('_token'))) {
            $entityManager->remove($jobPosition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_job_positions_index', [], Response::HTTP_SEE_OTHER);
    }
}
