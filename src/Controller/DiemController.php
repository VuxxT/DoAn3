<?php

namespace App\Controller;

use App\Entity\Diem;
use App\Form\DiemType;
use App\Repository\DiemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/diem')]
class DiemController extends AbstractController
{
    #[Route('/', name: 'app_diem_index', methods: ['GET'])]
    public function index(DiemRepository $diemRepository): Response
    {
        return $this->render('diem/index.html.twig', [
            'diems' => $diemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_diem_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $diem = new Diem();
        $form = $this->createForm(DiemType::class, $diem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($diem);
            $entityManager->flush();

            return $this->redirectToRoute('app_diem_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('diem/new.html.twig', [
            'diem' => $diem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_diem_show', methods: ['GET'])]
    public function show(Diem $diem): Response
    {
        return $this->render('diem/show.html.twig', [
            'diem' => $diem,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_diem_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Diem $diem, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DiemType::class, $diem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_diem_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('diem/edit.html.twig', [
            'diem' => $diem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_diem_delete', methods: ['POST'])]
    public function delete(Request $request, Diem $diem, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diem->getId(), $request->request->get('_token'))) {
            $entityManager->remove($diem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_diem_index', [], Response::HTTP_SEE_OTHER);
    }
}
