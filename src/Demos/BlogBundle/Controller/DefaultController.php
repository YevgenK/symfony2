<?php

namespace Demos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Demos\BlogBundle\Entity\Post;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DemosBlogBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction(Request $request)
    {
        $post = new Post();
        $post->setTitle('Post Title');
        $post->setBody('Write a blog post');
        $post->setCreatedDate(new \DateTime('now'));
        $post->setUpdatedDate(new \DateTime('now'));

        $form = $this->createFormBuilder($post)
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('demos_blog_create_success'));
        }

        return $this->render('DemosBlogBundle:Default:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function successAction()
    {
        return $this->render('DemosBlogBundle:Default:success.html.twig');
    }

    public function showAction($id)
    {
        $post = $this->getDoctrine()->getRepository('DemosBlogBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('Page not found!');
        }

        return $this->render('DemosBlogBundle:Default:show.html.twig', array(
            'post' => $post
        ));
    }

    public function listAction()
    {
        $postCollection = $this->getDoctrine()->getRepository('DemosBlogBundle:Post')->findAll();

        if (!$postCollection) {
            throw $this->createNotFoundException('Records not exists. Go to create!');
        }

        return $this->render('DemosBlogBundle:Default:list.html.twig', array(
            'postCollection' => $postCollection
        ));
    }
}