<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/list", methods={"GET"})
     */
    public function index(CategoryRepository $repository)
    {
        return $this->render('category/list.html.twig', ['categories' => $repository->findAll()]);
    }

    /**
     * @Route("/category/add", methods={"GET", "POST"})
     */
    public function add(Request $request, UrlGeneratorInterface $urlGenerator, EntityManagerInterface $manager)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $category = new Category();
            $category->setName($request->get('name'));

            $manager->persist($category);
            $manager->flush();

            $this->addFlash('info', 'Category has been save');

            return new RedirectResponse($urlGenerator->generate('app_category_index'));
        }

        return $this->render('category/add.html.twig');
    }

    /**
     * @Route("/category/{id}/edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(int $id, Request $request, CategoryRepository $repository, EntityManagerInterface $manager, UrlGeneratorInterface $urlGenerator)
    {
        $category = $repository->find($id);
        if (!$category) {
            $this->addFlash('error', 'Category not found');
        }

        if ($category && $request->isMethod(Request::METHOD_POST)) {
            $category->setName($request->get('name'));

            $manager->persist($category);
            $manager->flush();

            $this->addFlash('info', 'Category has been update');

            return new RedirectResponse($urlGenerator->generate('app_category_index'));
        }

        return $this->render('category/edit.html.twig', ['id' => $id, 'category' => $category]);
    }

    /**
     * @Route("/category/{id}/delete", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function delete(int $id, CategoryRepository $repository, EntityManagerInterface $manager, UrlGeneratorInterface $urlGenerator)
    {
        $category = $repository->find($id);
        if (!$category) {
            $this->addFlash('error', 'Category not found');
        } else {
            $manager->remove($category);
            $manager->flush();

            $this->addFlash('info', 'Category has been delete');
        }

        return new RedirectResponse($urlGenerator->generate('app_category_index'));
    }
}
