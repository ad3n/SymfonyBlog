<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PostController extends AbstractController
{
    /**
     * @Route("/post/list", methods={"GET"})
     */
    public function index(PostRepository $repository, Request $request)
    {
        return $this->render('post/list.html.twig', ['pagination' => $repository->paginate($request->get('page', 1), 10)]);
    }

    /**
     * @Route("/post/add", methods={"GET", "POST"})
     */
    public function add(Request $request, EntityManagerInterface $manager, UrlGeneratorInterface $urlGenerator)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $manager->persist($post);
                $manager->flush();

                $this->addFlash('info', 'Post has been save');

                return new RedirectResponse($urlGenerator->generate('app_post_index'));
            }
        }

        return $this->render('post/add.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/post/{id}/edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(int $id, Request $request)
    {

    }

    /**
     * @Route("/post/{id}/delete", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function delete(int $id, Request $request)
    {

    }
}
