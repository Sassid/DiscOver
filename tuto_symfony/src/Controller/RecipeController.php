<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use App\Repository\RecipeRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\String\Slugger\SluggerInterface;

class RecipeController extends AbstractController
{
    #[Route('/recettes', name: 'recipe_index')]
    public function index(Request $request, RecipeRepository $repository): Response
    {
        // dd($repository->findTotalDuration());
        // $shortRecipes = $repository->findByDurationLowerThan(30);
        // dd($allRecipes);

        $allRecipes = $repository->findAll();
        return $this->render('recipe/index.html.twig', [
            'recipes' => $allRecipes
            // 'recipes' => $shortRecipes
        ]);
    }

    #[Route('/recettes/{slug}-{id}', name: 'recipe_show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'], methods:['GET'])]
    public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
    {
        $recipe = $repository->find($id);
        dump($recipe);
        if ($recipe->getSlug() != $slug) {
            return $this->redirectToRoute('recipe_show', [
                'slug' => $recipe->getSlug(),
                'id' => $recipe->getId()
            ]);
        };

        // * Another object to return can be a json file:
        // ? Method 1:
        // return new JsonResponse(['slug' => $slug]);

        // ? Method 2:
        // return $this->json(['slug' => $slug]);

        return $this->render('recipe/show.html.twig', ['recipe' => $recipe]);
    }

    #[Route('/recettes/{id}/edit', name: 'recipe_edit', requirements: [
        'id' => Requirement::DIGITS
    ], methods:['GET', 'POST'])]
    public function edit(Recipe $recipe, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
        // dd($recipe);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'La recette a bien été modifiée');
            return $this->redirectToRoute('recipe_index');
        }
        return $this->render('recipe/edit.html.twig', [
            'recipe' => $recipe,
            'form' => $form
        ]);
    }

    #[Route('/recettes/create', name: 'recipe_create')]
    public function create(Request $request, EntityManagerInterface $em, SluggerInterface $slugger)
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $recipe->setCreatedAt(new DateTimeImmutable());
            $slug = $slugger->slug($recipe->getTitle())->lower();
            $recipe->setSlug($slug);
            $em->persist($recipe);
            $em->flush();
            $this->addFlash('success', 'La recette a bien été créée');
            return $this->redirectToRoute('recipe_index');
        }
        return $this->render('recipe/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/recettes/{id}/edit', name:'recipe_delete', methods:['DELETE'])]
    public function delete(Recipe $recipe, EntityManagerInterface $em)
    {
        $em->remove($recipe);
        $em->flush();
        $this->addFlash('success', 'La recette a bien été supprimée');

        return $this->redirectToRoute('recipe_index');
    }
}
