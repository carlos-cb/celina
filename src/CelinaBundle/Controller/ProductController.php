<?php

namespace CelinaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CelinaBundle\Entity\Product;
use CelinaBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{
    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('CelinaBundle:Product')->findAll();

        return $this->render('product/index.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     * Creates a new Product entity.
     *
     */
    public function newAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm('CelinaBundle\Form\ProductType', $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $product->getFoto();
            $fileName = $this->get('celina.foto_uploader')->upload($file);
            $product->setFoto($fileName);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction(Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);

        return $this->render('product/show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction(Request $request, Product $product)
    {
        $fileOld = $product->getFoto();
        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm('CelinaBundle\Form\ProductType', $product);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $product->getFoto();
            if($file != $fileOld)
            {
                $isRemoved = $this->get('celina.foto_uploader')->remove($fileOld);
                if($isRemoved){
                    $fileName = $this->get('celina.foto_uploader')->upload($file);
                    $product->setFoto($fileName);
                }
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //删除本身照片一张
            $file = $product->getFoto();
            if($file){
                $isRemoved = $this->get('celina.foto_uploader')->remove($file);
            }

            $productId = $product->getId();
            //删除细节图N张
            $query = $em->createQuery("SELECT p FROM CelinaBundle:Fotodetalle p WHERE p.product=$productId");
            $fotodetalles = $query->getResult();

            if (is_array($fotodetalles) || is_object($fotodetalles))
            {
                foreach($fotodetalles as $fotodetalle){
                    $file = $fotodetalle->getFotodetalle();
                    if($file){
                        $isRemoved = $this->get('celina.foto_uploader')->remove($file);
                    }
                    $em->remove($fotodetalle);
                }
                $em->flush();
            }

            //删除颜色图N张
            $query = $em->createQuery("SELECT p FROM CelinaBundle:Color p WHERE p.product=$productId");
            $colors = $query->getResult();

            if (is_array($colors) || is_object($colors))
            {
                foreach($colors as $color){
                    $file = $color->getColorFoto();
                    if($file){
                        $isRemoved = $this->get('celina.foto_uploader')->remove($file);
                    }
                    $em->remove($color);
                }
                $em->flush();
            }

            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('product_index');
    }

    /**
     * Creates a form to delete a Product entity.
     *
     * @param Product $product The Product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
