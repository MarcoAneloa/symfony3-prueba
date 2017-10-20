<?php

namespace OtraPruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="otraprueba_home")
     */
    public function indexAction()
    {
        return $this->render('OtraPruebaBundle:Default:index.html.twig');
    }

    /**
     * @Route("/nombre/{idnom}", name="otraprueba_nombre")
     */
    public function nombreAction($idnom='Sin nombre')
    {
        return $this->render('OtraPruebaBundle:Default:nombre.html.twig',array('idnom' => $idnom));
    }

    /**
     * @Route("/nombrer/{idnom}", name="otraprueba_nombrer")
     */
    public function nombrerAction($idnom='Sin nombre')
    {
        return new Response('<html><head></head> <body> Hola '.$idnom.'</body></html>');
    }

    /**
     * @Route("/vlc/", name="otraprueba_vlc")
     */
    public function vlcAction()
    {
        return $this->render('OtraPruebaBundle:Default:vlc.html.twig');
    }

    /**
     * @Route("/contactar/{lugar}", name="otraprueba_contactar")
     */
    public function contactarAction($lugar='vlc')
    {
        if ($lugar=='vlc') {
            return $this->redirect($this->generateUrl('otraprueba_vlc'));
        }elseif ($lugar=='mdr') {
            throw $this->createNotFoundException('Equivocado');
        }else{
            return $this->redirect('https://www.google.es');
        }

    }
}
