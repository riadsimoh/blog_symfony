<?php

namespace App\Controller;

use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ObjectManager;

use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        $repos = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repos->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            "articles" => $articles
        ]);
    }


    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('blog/home.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }



    /**
     * @Route("/blog/new", name="blog_create")
     */


    public function create(): Response
    {



        return $this->render('blog/create.html.twig');
    }

    /**
     * @Route("/blog/{id}", name="show_blog")
     */

    public function show($id): Response
    {

        $repos = $this->getDoctrine()->getRepository(Article::class);
        $article = $repos->find($id);


        return $this->render(
            'blog/show.html.twig',

            ['article' => $article]
        );
    }
}
