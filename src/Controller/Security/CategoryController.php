<?php

namespace App\Controller\Security;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController {
    
    /**
     * @Route("/category", name="index_category")
     */
    public function index(CategoryRepository $categoryRepository) : Response {
        $categoryRepository = $this->getDoctrine()->getRepository(Category::class);
        $category = $categoryRepository->findAll();

        return $this->render('Security/category/index.html.twig', [
            'categories' => $category,
        ]);
    }

    /**
     * @Route("/add-category", name="create_category")
     */
    public function createCategory(Request $request): Response {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $category = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('index_category');
        }

        return $this->render('Security/category/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/edit-category/{id}", name="edit_category")
    */
    public function editCategory(Category $category, Request $request): Response {
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $category = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('index_category');
        }

        return $this->render('Security/category/edit.html.twig', [
            'form' => $form->createView(),
            'category' => $category 
        ]);
    }

    /**
     * @Route("/remove-category/{id}", name="remove_category")
     */
    public function removeCategory(Category $category, Request $request): Response {

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $category = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();

            return $this->redirectToRoute('index_category');
        }

        return $this->render('Security/category/remove.html.twig', [
            'form' => $form->createView(),
            'category' => $category
        ]);
    }



}