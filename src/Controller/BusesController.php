<?php

namespace App\Controller;

use App\Entity\Buses;
use App\Form\BusesRoutesType;
use App\Form\BusesType;
use App\Repository\BusesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/buses')]
class BusesController extends AbstractController
{
    #[Route('/home', name: 'buses_index', methods: ['GET'])]
    public function index(BusesRepository $busesRepository): Response
    {
        return $this->render('buses/index.html.twig', [
            'buses' => $busesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'buses_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $bus = new Buses();
        $form = $this->createForm(BusesType::class, $bus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bus);
            $entityManager->flush();

            return $this->redirectToRoute('buses_index');
        }

        return $this->render('buses/new.html.twig', [
            'bus' => $bus,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/{id}', name: 'buses_show', methods: ['GET'])]
    public function show(Buses $bus): Response
    {
        return $this->render('buses/show.html.twig', [
            'bus' => $bus,
        ]);
    }

    #[Route('/{id}/edit', name: 'buses_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Buses $bus): Response
    {
        $form = $this->createForm(BusesType::class, $bus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('buses_index');
        }

        return $this->render('buses/edit.html.twig', [
            'bus' => $bus,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'buses_delete', methods: ['POST'])]
    public function delete(Request $request, Buses $bus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('buses_index');
    }
}
