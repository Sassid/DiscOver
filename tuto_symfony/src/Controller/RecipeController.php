<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'recipe.index')]
    public function index(Request $request): Response
    {
        return $this->render('recipe/index.html.twig');
    }

    #[Route('/recipe/{slug}-{id}', name: 'recipe.show', requirements: ['id'=> '\d+', 'slug'=> '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id): Response
    {
        // dd($slug, $id);

        // * Another object to return can be a json file:
        // ? Method 1:
        // return new JsonResponse(['slug' => $slug]);

        // ? Method 2:
        // return $this->json(['slug' => $slug]);

        return new Response('Recipe : ' . $slug);
    }
}
