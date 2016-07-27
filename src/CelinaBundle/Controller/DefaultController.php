<?php

namespace CelinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CelinaBundle:Default:index.html.twig');
    }

    public function backEndAction()
    {
        return $this->render('CelinaBundle:BackEnd:overview.html.twig');
    }
    
    public function productListAction($categoryId)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Product p WHERE p.category=$categoryId");
        $products = $query->getResult();
        
        return $this->render('CelinaBundle:Default:productList.html.twig', array(
            'products' => $products,
            'categories' => $categories,
        ));
    }
    
    public function productDetalleAction($productId)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        //获取产品信息
        $product = $this->getProductInfo($productId);

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Fotodetalle p WHERE p.product=$productId");
        $fotodetalles = $query->getResult();

        return $this->render('CelinaBundle:Default:productDetalle.html.twig', array(
            'fotodetalles' => $fotodetalles,
            'product' => $product,
            'categories' => $categories,
        ));
    }

    private function getProductInfo($productId)
    {
        //获取产品信息
        $product = $this->getDoctrine()
            ->getRepository('CelinaBundle:Product')
            ->findOneById($productId);
        return $product;
    }
}
