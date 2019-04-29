<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RealisationsController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        //Récupération des réalisations
        $realisation = $em->getRepository('AppBundle:Realisations')->findBy(
            array(),
            array('annee' => 'desc')
        );
        if (null === $realisation) {
            throw new NotFoundHttpException("La réalisation d'id ".$id." n'existe pas.");
        }


        // replace this example code with whatever you need
        return $this->render('AppBundle:Realisations:index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'realisation'           => $realisation,
        ]);
    }
}
