<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('blog/contact', name: 'app_contact')]
    public function index(): Response
    {
        $contact = new Contact();


        $form = $this->createForm(ContactType::class, $contact);


        return $this->render('blog/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
  // $form->handleRequest($request);
        // if ($form->isSubmitted() && $form->isValid()) {
        //     $contact = $form->getData();

        //     $manager->persist($contact);
        //     $manager->flush();

        //     //Email
        //     $mailService->sendEmail(
        //         $contact->getEmail(),
        //         $contact->getSubject(),
        //         'emails/contact.html.twig',
        //         ['contact' => $contact]
        //     );

        //     $this->addFlash(
        //         'success',
        //         'Votre demande a été envoyé avec succès !'
        //     );

        //     return $this->redirectToRoute('contact');
        // } else {
        //     $this->addFlash(
        //         'danger',
        //         $form->getErrors()
        //     );
        // }
