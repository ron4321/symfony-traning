<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(): Response
    {
        // 保存
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $entityManager->persist($product);
        $entityManager->flush();

        // 取得
        $id = 1;
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        dd($product);
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
