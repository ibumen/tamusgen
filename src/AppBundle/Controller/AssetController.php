<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AssetController extends Controller {

    /**
     * @Route("/css2/{css}")
     */
    public function aAction($css, Request $request) {
        $host = $request->getHost();
        //echo $host;
        return $this->redirect("http://" . $host . "/tamusgen/web/css/$css");
    }

    /**
     * @Route("/images2/{img}")
     */
    public function bAction($img) {
        $host = $request->getHost();
        //echo $host;
        return $this->redirect("http://" . $host . "/tamusgen/web/images/$img");
    }
    
    /**
     * @Route("/js2/{js}")
     */
    public function cAction($js) {
        $host = $request->getHost();
        //echo $host;
        return $this->redirect("http://" . $host . "/tamusgen/web/js/$img");
    }

}
