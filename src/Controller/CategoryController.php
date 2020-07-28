<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
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
    public function index(DataTableFactory $dataTableFactory, Request $request)
    {
        $table = $dataTableFactory->create()
            ->add('id', TextColumn::class, ['label' => 'ID'])
            ->add('name', TextColumn::class, ['label' => 'Name'])
            ->add('slug', TextColumn::class, ['label' => 'Url'])
            ->createAdapter(ORMAdapter::class, [
                'entity' => Category::class,
            ])
            ->handleRequest($request)
        ;

        if ($table->isCallback()) {
            return $table->getResponse();
        }

        return $this->render('category/list.html.twig', ['datatable' => $table]);
    }

    /**
     * @Route("/category/add", methods={"GET", "POST"})
     */
    public function add(Request $request, UrlGeneratorInterface $urlGenerator, EntityManagerInterface $manager)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $manager->persist($category);
                $manager->flush();

                $this->addFlash('info', 'Category has been save');

                return new RedirectResponse($urlGenerator->generate('app_category_index'));
            }
        }

        return $this->render('category/add.html.twig', ['form' => $form->createView()]);
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

        $form = $this->createForm(CategoryType::class, $category);
        if ($category && $request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $manager->persist($category);
                $manager->flush();

                $this->addFlash('info', 'Category has been update');

                return new RedirectResponse($urlGenerator->generate('app_category_index'));
            }
        }

        return $this->render('category/edit.html.twig', ['id' => $id, 'form' => $form->createView()]);
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
