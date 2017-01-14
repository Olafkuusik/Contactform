<?php
/**
 * Created by PhpStorm.
 * User: Olaf
 * Date: 5.01.2017
 * Time: 12:26
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Contacts;
use AppBundle\Form\ContactFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/contactform/", name="contact_index")
     */
    public function indexPageAction()
    {
        return $this->render('contactform/index.html.twig');
    }
    /**
     * @Route("/contactform/new", name="contact_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contacts = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacts);
            $em->flush();
            $this->addFlash('success', 'Contact created!');
            return $this->redirectToRoute('contact_index');
        }
       return $this->render('contactform/new.html.twig', ['contactForm' => $form->createView()]);
    }
    /**
     * @Route("/contactform/remove", name="contact_remove")
     */
    public function removeAction()
    {
        return $this->render('contactform/remove');
    }

    /**
     * @Route("/contactform/{id}/edit", name="contact_edit")
     */
    public function editAction(Request $request, Contacts $contacts)
    {
        $form = $this->createForm(ContactFormType::class, $contacts);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contacts = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacts);
            $em->flush();
            $this->addFlash('success', 'Contact updated!');
            return $this->redirectToRoute('contact_list');
        }
        return $this->render('contactform/edit.html.twig',
            ['contactForm' => $form->createView()]);
    }


    /**
     * @Route("/contactform/list/", name="contact_list")
     */
    public function listAction()
    {
        $contacts = $this->getDoctrine()
            ->getRepository('AppBundle:Contacts')
            ->findAll();
        return $this->render('contactform/list.html.twig', array(
            'contacts' => $contacts
        ));
    }

    /* {
        $em = $this ->getDoctrine()->getManager();
        $contacts = $em->getRepository('AppBundle:Contacts')
            ->findAll();
        dump($contacts);die;
        return $this->render('contactform/list.html.twig', array(
            'id' => $contacts,
            'contact' => $contacts

        ));
    }*/
    /**
     * @Route("/contactform/list/contacts", name="contact_contacts")
     * @Method("GET")
     */
    public function getContactsAction(Contacts $contactname, Contacts $contact)
    {
        $contact->getContacts(); //problems here i guess, i commented the old working fixed code
     /*   $contact = [
            ['id' => 1, 'firstname' => 'AquaPelham', 'lastname' => 'lala', 'phonenumber' => '6543210', 'bday' => 'Dec. 10 2015', 'address' => 'tartu'],
            ['id' => 2, 'firstname' => 'AquaWeaver', 'lastname' => 'ryan', 'phonenumber' => '123456', 'bday' => 'Dec. 1 2015', 'address' => 'tere'],
            ['id' => 3, 'firstname' => 'AquaPelham', 'lastname' => 'leanna', 'phonenumber' => '7890123', 'bday' => 'Aug. 20 2015', 'address' => 'tallinn'],
    ];*/
        $data = [
            'contacts' => $contact
        ];
        return new JsonResponse($data);
    }
    /**
     * @Route("/contactform/list/{contactName}")
     */
    public function showAction($contactName)
    {
        return $this->render('contactform/show.html.twig', array(
            'name' => $contactName
        ));
    }


}