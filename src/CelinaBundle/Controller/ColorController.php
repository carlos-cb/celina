<?php

namespace CelinaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CelinaBundle\Entity\Color;
use CelinaBundle\Form\ColorType;

/**
 * Color controller.
 *
 */
class ColorController extends Controller
{
    /**
     * Lists all Color entities.
     *
     */
    public function indexAction($productId)
    {
        $em = $this->getDoctrine()->getManager();

        //获取产品信息
        $product = $this->getProductInfo($productId);

        $query = $em->createQuery("SELECT p FROM CelinaBundle:Color p WHERE p.product=$productId");
        $colors = $query->getResult();

        return $this->render('color/index.html.twig', array(
            'colors' => $colors,
            'product' => $product
        ));
    }

    /**
     * Creates a new Color entity.
     *
     */
    public function newAction(Request $request, $productId)
    {
        $color = new Color();
        $product = $this->getProductInfo($productId);
        $color->setProduct($product);
        $form = $this->createForm('CelinaBundle\Form\ColorType', $color);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $color->getColorFoto();
            $fileName = $this->get('celina.foto_uploader')->upload($file);
            $color->setColorFoto($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            return $this->redirectToRoute('color_index', array('productId' => $productId));
        }

        return $this->render('color/new.html.twig', array(
            'color' => $color,
            'form' => $form->createView(),
            'product' => $product,
        ));
    }

    /**
     * Finds and displays a Color entity.
     *
     */
    public function showAction(Color $color)
    {
        $deleteForm = $this->createDeleteForm($color);

        return $this->render('color/show.html.twig', array(
            'color' => $color,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Color entity.
     *
     */
    public function editAction(Request $request, Color $color, $productId)
    {
        $fileOld = $color->getColorFoto();
        $deleteForm = $this->createDeleteForm($color);
        $editForm = $this->createForm('CelinaBundle\Form\ColorType', $color);
        $editForm->handleRequest($request);
        $product = $this->getProductInfo($productId);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $color->getColorFoto();
            if($file != $fileOld)
            {
                $isRemoved = $this->get('celina.foto_uploader')->remove($fileOld);
                if($isRemoved){
                    $fileName = $this->get('celina.foto_uploader')->upload($file);
                    $color->setColorFoto($fileName);
                }
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            return $this->redirectToRoute('color_index', array('productId' => $productId));
        }

        return $this->render('color/edit.html.twig', array(
            'color' => $color,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'product' => $product,
        ));
    }

    /**
     * Deletes a Color entity.
     *
     */
    public function deleteAction(Request $request, Color $color)
    {
        $productId = $color->getProduct();
        $form = $this->createDeleteForm($color);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $color->getColorFoto();
            if($file){
                $isRemoved = $this->get('celina.foto_uploader')->remove($file);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->remove($color);
            $em->flush();
        }

        return $this->redirectToRoute('color_index', array(
            'productId' => $productId,
        ));
    }

    /**
     * Creates a form to delete a Color entity.
     *
     * @param Color $color The Color entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Color $color)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('color_delete', array('id' => $color->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
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
