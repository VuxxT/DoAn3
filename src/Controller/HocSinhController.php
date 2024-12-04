<?php

namespace App\Controller;

use App\Entity\HocSinh;
use App\Form\HocSinhType;
use App\Repository\HocSinhRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hocsinh')]
class HocSinhController extends AbstractController
{
    #[Route('/', name: 'app_hoc_sinh_index', methods: ['GET'])]
    public function index(HocSinhRepository $hocSinhRepository): Response
    {
        return $this->render('hoc_sinh/index.html.twig', [
            'hoc_sinhs' => $hocSinhRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_hoc_sinh_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $hocSinh = new HocSinh();
        $form = $this->createForm(HocSinhType::class, $hocSinh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($hocSinh);
            $entityManager->flush();

            return $this->redirectToRoute('app_hoc_sinh_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hoc_sinh/new.html.twig', [
            'hoc_sinh' => $hocSinh,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hoc_sinh_show', methods: ['GET'])]
    public function show(HocSinh $hocSinh): Response
    {
        return $this->render('hoc_sinh/show.html.twig', [
            'hoc_sinh' => $hocSinh,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hoc_sinh_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HocSinh $hocSinh, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HocSinhType::class, $hocSinh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_hoc_sinh_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hoc_sinh/edit.html.twig', [
            'hoc_sinh' => $hocSinh,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hoc_sinh_delete', methods: ['POST'])]
    public function delete(Request $request, HocSinh $hocSinh, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hocSinh->getId(), $request->request->get('_token'))) {
            $entityManager->remove($hocSinh);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_hoc_sinh_index', [], Response::HTTP_SEE_OTHER);
    }
}
