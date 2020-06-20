<?php

namespace App\Controller;

use App\Helper\MarkdownHelper;
use App\Repository\PostRepository;
use cebe\markdown\Markdown;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     * @param PostRepository $repo
     * @param MarkdownHelper $helper
     * @param Markdown $parser
     * @return Response
     */
    public function index(PostRepository $repo,MarkdownHelper $helper )
    {

        $posts = $repo->findAll();

        $parsedPost=$helper->parse($posts);

        return $this->render('post/index.html.twig', [
            'posts' => $parsedPost
        ]);
    }
}
