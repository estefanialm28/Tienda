<?php

namespace App\Controller;

use App\Entity\Contacto;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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

            ->add('nombre', TextType::class, ['attr' => ['class' => 'stext-111 cl2 plh3 size-116 p-l-62 p-r-30',
                                                'placeholder' => 'Tu nombre']])

            ->add('telefono', TextType::class, ['attr' => ['class' => 'stext-111 cl2 plh3 size-116 p-l-62 p-r-30',
                                                'placeholder' => 'Tu teléfono']])

            ->add('correo', EmailType::class, ['label' => 'Correo Electronico',
                                                'attr' => ['class' => 'stext-111 cl2 plh3 size-116 p-l-62 p-r-30',
                                            'placeholder' => 'Correo']])

            ->add('asunto', TextareaType::class, [
                'attr' => ['class' => 'stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25',
                            'placeholder' => '¿En qué puedo ayudarte?']])

            ->add('save', SubmitType::class, ['label' => 'Enviar',
                                            'attr' => ['class' => 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer',]])

            ->getForm();

            $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid()){
            $contacto = $formulario->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            return $this->redirectToRoute('inicio', ["codigo" => $contacto->getId()]);
        }
        return $this->render('contacto.html.twig', array(
            'form' => $formulario->createView()
        ));
    }

    

    
}
