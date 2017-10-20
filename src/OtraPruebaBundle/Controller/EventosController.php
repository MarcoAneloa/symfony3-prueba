<?php

namespace OtraPruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use OtraPruebaBundle\Entity\Eventos;
use Symfony\Component\HttpFoundation\Response;


class EventosController extends Controller
{
    /**
     * @Route("/all", name="otraprueba_all")
     */
    public function allAction()
    {
        $repository=$this->getDoctrine()->getRepository('OtraPruebaBundle:Eventos');
        $eventos=$repository->findAll();

        return $this->render('OtraPruebaBundle:Eventos:all.html.twig',array("eventos"=> $eventos));
    }


    /**
     * @Route("/create", name="otraprueba_create")
     */
    public function createAction()
    {
		// you can fetch the EntityManager via $this->getDoctrine()
		// or you can add an argument to your action: createAction(EntityManagerInterface $em)
		$em = $this->getDoctrine()->getManager();

		$evento = new Eventos();
		$evento->setNombreEvento('prueba1');
		$evento->setFecha( new \DateTime('2013-01-15'));
		$evento->setCiudad('prueba1');
		$evento->setPoblacion('prueba1');


		// tells Doctrine you want to (eventually) save the Product (no queries yet)
		$em->persist($evento);

		// actually executes the queries (i.e. the INSERT query)
		$em->flush();

		return new Response('Saved new evento with id '.$evento->getId());
    }

    /**
     * @Route("/show/{Id}", name="otraprueba_show")
     */
	public function showAction($Id)
	{
	    $evento = $this->getDoctrine()->getRepository(Eventos::class)->find($Id);

	    if (!$evento) {
	        throw $this->createNotFoundException(
	            'No evento found for id '.$Id
	        );
	    }

	    return $this->render('OtraPruebaBundle:Eventos:show.html.twig',array("id"=>$evento->getId(),"nombre"=>$evento->getNombreEvento()));
	}
}
