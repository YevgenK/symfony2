<?php

namespace Demos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Demos\BlogBundle\Entity\Comment;
use Demos\BlogBundle\Entity\Post;

class CommentController extends Controller
{
    public function createAction(Request $request)
    {
        $comment = new Comment();
        $comment->setCreatedDate(new \DateTime('now'));
        $comment->setUpdatedDate(new \DateTime('now'));

        $form = $this->createFormBuilder($comment)
            ->add('post_id', 'hidden')
            ->add('comment', 'textarea')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        $postId = $comment->getPostId();
        $post = $this->getDoctrine()
            ->getRepository('DemosBlogBundle:Post')
            ->find($postId);

        if ($request->isMethod('POST') && $form->isValid()) {
            $comment->setPostId($post);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($comment);
            $em->flush();

            $this->get('session')->getFlashBag()->set('notice', 'Thank you for comment ;)');
            return $this->redirect($this->generateUrl('demos_blog_show', array('id' => $postId)));
        }
        $debug = $form->getErrors();
        $this->get('session')->getFlashBag()->set('error', 'Something wrong. Please check form');
        return $this->redirect($this->generateUrl('demos_blog_show', array('id' => $postId)));
    }
}