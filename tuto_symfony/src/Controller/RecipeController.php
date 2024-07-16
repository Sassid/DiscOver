<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    #[Route('/recettes', name: 'recipe_index')]
    public function index(Request $request, RecipeRepository $repository): Response
    {
        $allRecipes = $repository->findAll();
        // dd($allRecipes);
        return $this->render('recipe/index.html.twig', [
            'recipes' => $allRecipes
        ]);
    }

    #[Route('/recettes/{slug}-{id}', name: 'recipe_show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
    {
       $recipe = $repository->find($id);
       dd($recipe);
        // dd($slug, $id);

        // * Another object to return can be a json file:
        // ? Method 1:
        // return new JsonResponse(['slug' => $slug]);

        // ? Method 2:
        // return $this->json(['slug' => $slug]);

        return $this->render('recipe/show.html.twig', [
            'slug' => $slug,
            'id' => $id
        ]);
    }
}
