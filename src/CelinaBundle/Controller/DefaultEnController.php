<?php

namespace CelinaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultEnController extends Controller
{
    public function indexAction()
    {
         return $this->render('CelinaBundle:DefaultEn:index.html.twig');
    }

    public function productListAction($categoryId)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Product p WHERE p.category=$categoryId");
        $products = $query->getResult();

        return $this->render('CelinaBundle:DefaultEn:productList.html.twig', array(
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

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Color p WHERE p.product=$productId");
        $colors = $query->getResult();

        return $this->render('CelinaBundle:DefaultEn:productDetalle.html.twig', array(
            'fotodetalles' => $fotodetalles,
            'colors' => $colors,
            'product' => $product,
            'categories' => $categories,
        ));
    }

    public function productListNewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CelinaBundle:Category')->findAll();

        //在此添加新产品的id值！！展示在ultima semana页面中
        $query = $em->createQuery("SELECT p FROM CelinaBundle:Product p WHERE p.id in (14,20,21)");
        $products = $query->getResult();

        return $this->render('CelinaBundle:DefaultEn:new.html.twig', array(
            'products' => $products,
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
