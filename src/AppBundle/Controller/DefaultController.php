<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction($_route, Request $request)
    {
       //$request->getPathInfo()
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request){
        return $this->redirectToRoute("homepage");
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request){
        return $this->render('default/contact.html.twig', array("pgtitle"=>"Contact Us"));
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request){
        return new Response("Admin");
    }
}
