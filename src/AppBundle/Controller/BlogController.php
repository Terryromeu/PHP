<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\User;
use AppBundle\Form\CommentaireType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Blog:index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function articleAction($id, Request $request)
    {
        {
            //PARTIE ARTICLES
            $em = $this->getDoctrine()->getManager();
            $article = $em->getRepository('AppBundle:Article')->find($id);
            if (null === $article) {
                throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
            }

            //PARTIE AJOUT COMMENTAIRES
            $comment = new Commentaire();
            $comment->setDate(new \Datetime());
            $comment->setArticle($article);

            if (!($this->getUser())==null) {
                $user = $this->getUser();
                $comment->setUser($user);
            }

            $form = $this->get('form.factory')->create(CommentaireType::class, $comment);
            if ($form->handleRequest($request)->isValid()) {
                $emb = $this->getDoctrine()->getManager();
                $emb->persist($comment);
                $emb->flush();

                $request->getSession()->getFlashBag()->add('info', 'Votre commentaire a été envoyé avec succès, il sera affiché après sa validation !');

                return $this->redirect($this->generateUrl('blog_article', array('id' => $article->getId())));
            }

            //PARTIE AFFICHAGE COMMENTAIRES
            $listeCommentaires = $em
                ->getRepository('AppBundle:Commentaire')
                ->findBy(array('article' => $article));

            return $this->render('AppBundle:Blog:article.html.twig', array(
                'article'           => $article,
                'listeCommentaires' => $listeCommentaires,
                'form' => $form->createView()
            ));
        }
    }

    public function menuAction($limit)
    {
        $em = $this->getDoctrine()->getManager();

        $listArticles = $em->getRepository('AppBundle:Article')->findBy(
            array('published' => 1),                 // Pas de critère
            array('date' => 'desc'), // On trie par date décroissante
            $limit,                  // On sélectionne $limit annonces
            0                        // À partir du premier
        );

        return $this->render('AppBundle:Blog:menu.html.twig', array(
            'listArticles' => $listArticles
        ));

    }
}
