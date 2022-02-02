<?php

namespace App\Controller;

use App\Entity\Contacto;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto", name="contacto")
     */
    public function nuevo(ManagerRegistry $doctrine, Request $request) {

        $contacto = new Contacto();

        $formulario = $this->createFormBuilder($contacto)

            ->add('nombre', TextType::class)

            ->add('telefono', TextType::class)

            ->add('correo', EmailType::class, array('label' => 'Correo electrónico'))

            ->add('asunto', TextType::class)

            ->add('save', SubmitType::class, array('label' => 'Enviar'))

            ->getForm();

            $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()){
            $contacto = $formulario->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            return $this->redirectToRoute('ficha_contacto', ["codigo" => $contacto->getId()]);
        }
        return $this->render('contacto.html.twig', array(
            'formulario' => $formulario->createView()
        ));
    }
    
}
