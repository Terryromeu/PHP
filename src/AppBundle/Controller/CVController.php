<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CVController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        //Récupération des formations
        $formation = $em->getRepository('AppBundle:CVFormation')->findBy(
            array(),
            array('id' => 'desc')
        );
        if (null === $formation) {
            throw new NotFoundHttpException("La formation d'id ".$id." n'existe pas.");
        }


        //Récupération des expériences
        $experience = $em->getRepository('AppBundle:CVExperience')->findBy(
            array(),
            array('id' => 'desc')
        );
        if (null === $experience) {
            throw new NotFoundHttpException("L'expérience d'id ".$id." n'existe pas.");
        }




        // replace this example code with whatever you need
        return $this->render('AppBundle:CV:cv.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'formation'           => $formation,
            'experience'           => $experience,
        ]);
    }
}
