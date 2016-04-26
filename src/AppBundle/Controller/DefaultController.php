<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\Type\MessageType;
use AppBundle\Entity\Message;

class DefaultController extends Controller {

    private $content = "<div class='alert alert-warning' role='alert'><strong>Oh Snap!</strong> Content temporarily not available.</div>";

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction($_route, Request $request) {
        //$request->getPathInfo()
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
                    'msgfrm' => $form->createView(),
        ));
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $siteContent = $em->getRepository("AppBundle:SiteContent")->findOneByContentName("about_us");
        if ($siteContent != NULL) {
            $this->content = $siteContent->getContentValue();
        }
        return $this->render('default/about.html.twig', array("pgtitle" => "About Us", "sitecontent" => $this->content));
    }

    /**
     * @Route("/service", name="service")
     */
    public function serviceAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $siteContent = $em->getRepository("AppBundle:SiteContent")->findOneByContentName("our_services");
        if ($siteContent != NULL) {
            $this->content = $siteContent->getContentValue();
        }
        return $this->render('default/service.html.twig', array("pgtitle" => "Our Services", "sitecontent" => $this->content));
    }

    /**
     * @Route("/partner", name="partner")
     */
    public function partnerAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $partners = $em->getRepository("AppBundle:Partner")->findAll();
        $siteContent = $em->getRepository("AppBundle:SiteContent")->findOneByContentName("our_partners");
        if ($siteContent != NULL) {
            $this->content = $siteContent->getContentValue();
        }
        return $this->render('default/partner.html.twig', array("pgtitle" => "Our Partners", "sitecontent" => $this->content, "partners" => $partners));
    }

    /**
     * @Route("/client", name="client")
     */
    public function clientAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository("AppBundle:Client")->findAll();
        $siteContent = $em->getRepository("AppBundle:SiteContent")->findOneByContentName("our_clients");
        if ($siteContent != NULL) {
            $this->content = $siteContent->getContentValue();
        }
        return $this->render('default/client.html.twig', array("pgtitle" => "Our Clients", "sitecontent" => $this->content, "clients" => $clients));
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request) {
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        return $this->render('default/contact.html.twig', array("pgtitle" => "Contact Us", "msgfrm" => $form->createView()));
    }

    /**
     * @Route("/sendmsg", name="sendmessage")
     */
    public function sendMsgAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $message = new Message();
            $form = $this->createForm(new MessageType(), $message);
            $form->handleRequest($request);
            // return new Response($message->getMessageBody());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($message);
                $em->flush();
                return new Response("1");
            }
            return new Response("0");
        } else {
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request) {
        return new Response("Admin");
    }

}
