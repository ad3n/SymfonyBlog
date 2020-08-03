<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
    public function add(Request $reques)
    {

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
