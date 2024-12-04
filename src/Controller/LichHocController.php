<?php

namespace App\Controller;

use App\Entity\LichHoc;
use App\Form\LichHocType;
use App\Repository\LichHocRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lichhoc')]
class LichHocController extends AbstractController
{
    #[Route('/', name: 'app_lich_hoc_index', methods: ['GET'])]
    public function index(LichHocRepository $lichHocRepository): Response
    {
        return $this->render('lich_hoc/index.html.twig', [
            'lich_hocs' => $lichHocRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lich_hoc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lichHoc = new LichHoc();
        $form = $this->createForm(LichHocType::class, $lichHoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lichHoc);
            $entityManager->flush();

            return $this->redirectToRoute('app_lich_hoc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lich_hoc/new.html.twig', [
            'lich_hoc' => $lichHoc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lich_hoc_show', methods: ['GET'])]
    public function show(LichHoc $lichHoc): Response
    {
        return $this->render('lich_hoc/show.html.twig', [
            'lich_hoc' => $lichHoc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lich_hoc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LichHoc $lichHoc, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LichHocType::class, $lichHoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_lich_hoc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lich_hoc/edit.html.twig', [
            'lich_hoc' => $lichHoc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lich_hoc_delete', methods: ['POST'])]
    public function delete(Request $request, LichHoc $lichHoc, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lichHoc->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lichHoc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_lich_hoc_index', [], Response::HTTP_SEE_OTHER);
    }
}
