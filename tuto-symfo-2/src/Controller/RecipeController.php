<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route(path: '/recettes', name: 'recipes.')]
class RecipeController extends AbstractController
{

    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('recipes/index.html.twig');
    }

    #[Route(path: '/{slug}-{id}', name: 'show', requirements: [
        'id' => Requirement::DIGITS,
        'slug' => Requirement::ASCII_SLUG
    ])]
    public function show(Request $request, string $slug, int $id): Response
    {
        // dd($request->attributes->get('slug'), $request->attributes->get('id'));
        // dd($request->get('slug'), $request->get('id'));
        // dd($slug, $id);

        // return new Response("Recette : $slug");
        return $this->render('recipes/show.html.twig', [
            'id' => $id,
            'slug' => $slug
        ]);
    }
}
