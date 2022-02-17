<?php

namespace App\Controller;

use App\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Categoria;
use App\Entity\Producto;
use Symfony\Component\HttpFoundation\RequestStack;

class PageController extends AbstractController
{
   
    /**
     * @Route("/", name="inicio")
     */
    public function inicio(ManagerRegistry $doctrine)
    {
        $repositorio = $doctrine->getRepository(Categoria::class);

        $categorias = $repositorio->findAll();

        $repositorioProd = $doctrine->getRepository(Producto::class);

        $productos = $repositorioProd->findAll();
        
        
        return $this->render('index.html.twig', ['categorias' => $categorias, 'productos' => $productos]);
    }

    /**
     * @Route("/categoria/{nombre}/{id}", name="categoria")
     */
    public function listado(ManagerRegistry $doctrine, $id)
    {
        $repositorio = $doctrine->getRepository(Categoria::class);

        $categorias = $repositorio->findAll();
        $categoria = $repositorio->find($id);

        $repositorioProd = $doctrine->getRepository(Producto::class);

        $productos = $repositorioProd->findBy(['categoria' => $id]);
        
        
        return $this->render('index.html.twig', ['categorias' => $categorias, 'productos' => $productos]);
    }

    /**
     * @Route("/producto/{nombre}/{id}", name="producto")
     */
    public function detalleProducto(ManagerRegistry $doctrine, $id)
    {
        $repositorio = $doctrine->getRepository(Producto::class);

        $producto = $repositorio->find($id);

        
        return $this->render('fichaProducto.html.twig', ['producto' => $producto]);
    }

    
    /**
     * @Route("/cabecera", name="cabecera")
     */
    /*
    public function mostrarCabecera(ManagerRegistry $doctrine)
    {
        $repositorio = $doctrine->getRepository(Cabecera::class);

        $cabeceras = $repositorio->findAll();

        return $this->render('cabecera.html.twig', ['cabeceras' => $cabeceras]);
    }
    */
}