<?php

namespace App\Controller;

use App\Entity\Lop;
use App\Form\LopType;
use App\Repository\LopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lop')]
class LopController extends AbstractController
{
    #[Route('/', name: 'app_lop_index', methods: ['GET'])]
    public function index(LopRepository $lopRepository): Response
    {
        return $this->render('lop/index.html.twig', [
            'lops' => $lopRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lop_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lop = new Lop();
        $form = $this->createForm(LopType::class, $lop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lop);
            $entityManager->flush();

            return $this->redirectToRoute('app_lop_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lop/new.html.twig', [
            'lop' => $lop,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lop_show', methods: ['GET'])]
    public function show(Lop $lop): Response
    {
        return $this->render('lop/show.html.twig', [
            'lop' => $lop,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lop_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lop $lop, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LopType::class, $lop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_lop_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lop/edit.html.twig', [
            'lop' => $lop,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lop_delete', methods: ['POST'])]
    public function delete(Request $request, Lop $lop, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lop->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lop);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_lop_index', [], Response::HTTP_SEE_OTHER);
    }
}
