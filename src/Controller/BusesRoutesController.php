<?php

namespace App\Controller;

use App\Entity\BusesRoutes;
use App\Form\BusesRoutesType;
use App\Repository\BusesRoutesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/buses/routes')]
class BusesRoutesController extends AbstractController
{
    #[Route('/list', name: 'buses_routes_index', methods: ['GET'])]
    public function index(BusesRoutesRepository $busesRoutesRepository): Response
    {
        return $this->render('buses_routes/index.html.twig', [
            'buses_routes' => $busesRoutesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'buses_routes_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $busesRoute = new BusesRoutes();
        $form = $this->createForm(BusesRoutesType::class, $busesRoute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($busesRoute);
            $entityManager->flush();

            return $this->redirectToRoute('buses_routes_index');
        }

        return $this->render('buses_routes/new.html.twig', [
            'buses_route' => $busesRoute,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'buses_routes_show', methods: ['GET'])]
    public function show(BusesRoutes $busesRoute): Response
    {
        return $this->render('buses_routes/show.html.twig', [
            'buses_route' => $busesRoute,
        ]);
    }

    #[Route('/{id}/edit', name: 'buses_routes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BusesRoutes $busesRoute): Response
    {
        $form = $this->createForm(BusesRoutesType::class, $busesRoute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('buses_routes_index');
        }

        return $this->render('buses_routes/edit.html.twig', [
            'buses_route' => $busesRoute,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'buses_routes_delete', methods: ['POST'])]
    public function delete(Request $request, BusesRoutes $busesRoute): Response
    {
        if ($this->isCsrfTokenValid('delete'.$busesRoute->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($busesRoute);
            $entityManager->flush();
        }

        return $this->redirectToRoute('buses_routes_index');
    }
}
