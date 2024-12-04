<?php

namespace App\Controller;

use App\Entity\MonHoc;
use App\Form\MonHocType;
use App\Repository\MonHocRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/monhoc')]
class MonHocController extends AbstractController
{
    #[Route('/', name: 'app_mon_hoc_index', methods: ['GET'])]
    public function index(MonHocRepository $monHocRepository): Response
    {
        return $this->render('mon_hoc/index.html.twig', [
            'mon_hocs' => $monHocRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mon_hoc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $monHoc = new MonHoc();
        $form = $this->createForm(MonHocType::class, $monHoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($monHoc);
            $entityManager->flush();

            return $this->redirectToRoute('app_mon_hoc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mon_hoc/new.html.twig', [
            'mon_hoc' => $monHoc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mon_hoc_show', methods: ['GET'])]
    public function show(MonHoc $monHoc): Response
    {
        return $this->render('mon_hoc/show.html.twig', [
            'mon_hoc' => $monHoc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mon_hoc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MonHoc $monHoc, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MonHocType::class, $monHoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_mon_hoc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mon_hoc/edit.html.twig', [
            'mon_hoc' => $monHoc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mon_hoc_delete', methods: ['POST'])]
    public function delete(Request $request, MonHoc $monHoc, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$monHoc->getId(), $request->request->get('_token'))) {
            $entityManager->remove($monHoc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mon_hoc_index', [], Response::HTTP_SEE_OTHER);
    }
}
