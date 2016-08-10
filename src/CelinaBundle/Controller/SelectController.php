<?php

namespace CelinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SelectController extends Controller
{
    public function selectNewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Product p WHERE p.isNew=1");
        $products = $query->getResult();

        return $this->render('select/new.html.twig', array(
            'products' => $products,
            'categories' => $categories,
        ));
    }

    public function selectHotAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Product p WHERE p.isHot=1");
        $products = $query->getResult();

        return $this->render('select/hot.html.twig', array(
            'products' => $products,
            'categories' => $categories,
        ));
    }

    public function selectSaleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Product p WHERE p.isSale=1");
        $products = $query->getResult();

        return $this->render('select/sale.html.twig', array(
            'products' => $products,
            'categories' => $categories,
        ));
    }
}
