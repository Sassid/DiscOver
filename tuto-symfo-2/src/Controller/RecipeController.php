<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route(path: '/recettes', name: 'recipes.')]
class RecipeController extends AbstractController
{

    #[Route(path: '/', name: 'index')]
    public function index(Request $request, RecipeRepository $repository): Response
    {
       $recipes = $repository->findWithDurationLowerThan(20);
    //    dd($recipes);

        return $this->render('recipes/index.html.twig', [
            'recipes' => $recipes
        ]);
    }

    #[Route(path: '/{slug}-{id}', name: 'show', requirements: [
        'id' => Requirement::DIGITS,
        'slug' => Requirement::ASCII_SLUG
    ])]
    public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
    {
        // dd($request->attributes->get('slug'), $request->attributes->get('id'));
        // dd($request->get('slug'), $request->get('id'));
        // dd($slug, $id);

        // return new Response("Recette : $slug");

        $recipe = $repository->find($id);
        // dd($recipe);

        if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipes.show', [
                'slug' => $recipe->getSlug(),
                'id' => $recipe->getId()
            ]);
        }

        return $this->render('recipes/show.html.twig', [
            'recipe' => $recipe
        ]);
    }
}
