<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('blog/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();

            // erreur : Serialization of 'Closure' is not allowed
            //     $this->addFlash(
            //         'success',
            //         'Votre message a bien été envoyé'
            //     );

            //     return $this->redirectToRoute('app_contact');
            // } else {
            //     $this->addFlash(
            //         'danger',
            //         $form->getErrors()
            //     );
        }


        return $this->render('blog/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
