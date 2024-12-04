<?php

namespace App\Controller;

use App\Entity\HocKy;
use App\Form\HocKyType;
use App\Repository\HocKyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hocky')]
class HocKyController extends AbstractController
{
    #[Route('/', name: 'app_hoc_ky_index', methods: ['GET'])]
    public function index(HocKyRepository $hocKyRepository): Response
    {
        return $this->render('hoc_ky/index.html.twig', [
            'hoc_kies' => $hocKyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_hoc_ky_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $hocKy = new HocKy();
        $form = $this->createForm(HocKyType::class, $hocKy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($hocKy);
            $entityManager->flush();

            return $this->redirectToRoute('app_hoc_ky_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hoc_ky/new.html.twig', [
            'hoc_ky' => $hocKy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hoc_ky_show', methods: ['GET'])]
    public function show(HocKy $hocKy): Response
    {
        return $this->render('hoc_ky/show.html.twig', [
            'hoc_ky' => $hocKy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hoc_ky_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HocKy $hocKy, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HocKyType::class, $hocKy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_hoc_ky_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hoc_ky/edit.html.twig', [
            'hoc_ky' => $hocKy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hoc_ky_delete', methods: ['POST'])]
    public function delete(Request $request, HocKy $hocKy, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hocKy->getId(), $request->request->get('_token'))) {
            $entityManager->remove($hocKy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_hoc_ky_index', [], Response::HTTP_SEE_OTHER);
    }
}
