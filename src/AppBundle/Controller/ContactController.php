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
use Doctrine\Common\Collections\ArrayCollection;

class ContactController extends Controller
{
    /**
     * @Route("/contactform/", name="contact_index")
     */
    public function menuPageAction() //Main menu page
    {
        return $this->render('contactform/index.html.twig');
    }
    /**
     * @Route("/contactform/new", name="contact_new")
     */
    public function newAction(Request $request) //Creates new entry to the contactform database
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contacts = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacts);
            $em->flush();
            $this->addFlash('Success', 'Contact created!');
            return $this->redirectToRoute('contact_index');
        }
       return $this->render('contactform/new.html.twig', ['contactForm' => $form->createView()]);
    }
    /**
     * @Route("/contactform/remove/{id}", name="contact_remove")
     */
    public function removeAction($id, Contacts $contacts) //Deletes contact from database
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Contacts');
        $contactRepo = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($contactRepo);
        $em->flush();
        $this->addFlash('Success', 'Contact deleted!');
        return $this->redirectToRoute('contact_index');
    }
    /**
     * @Route("/contactform/edit/{id}", name="contact_edit")
     */
    public function editAction(Request $request, Contacts $contacts) //fills the form with data from database, user can then modify the data
    {
        $form = $this->createForm(ContactFormType::class, $contacts);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contacts = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacts);
            $em->flush();
            $this->addFlash('Success', 'Contact updated!');
            return $this->redirectToRoute('contact_list');
        }
        return $this->render('contactform/edit.html.twig',
            ['contactForm' => $form->createView()]);
    }


    /**
     * @Route("/contactform/list/", name="contact_list")
     */
    public function listAction(Request $request) //lists all contacts and paginates
    {
        $contacts = $this->getDoctrine()
            ->getRepository('AppBundle:Contacts')
            ->findAll();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $contacts,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit',5)
        );
        return $this->render('contactform/list.html.twig', array(
            'contacts' => $contacts,
            'pagination' => $result,
        ));
    }
    public function listAgeAction() //queries the birthday for age calculation
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'select DATE_DIFF(CURRENT_DATE(),birthday)
          from AppBundle:Contacts'
        );
        $contacts = $query->getResult();
        return $this->render('contactform/list.html.twig',array(
            'birthday' => '$contacts'
            ));
    }

    /**
     * @Route("/contactform/list/contacts", name="contact_contacts")
     */
    public function getContactsAction() //first ajax version of contacts creation and listing, partially in use
    {
        $contact = $this->getDoctrine()
            ->getRepository('AppBundle:Contacts')
            ->findAll();
       // dump($contact);die;
        /*  $contact->getContacts(); //problems here i guess, i commented the old working fixed code
          $contact = [
              ['id' => 1, 'firstname' => 'AquaPelham', 'lastname' => 'lala', 'phonenumber' => '6543210', 'bday' => 'Dec. 10 2015', 'address' => 'tartu'],
              ['id' => 2, 'firstname' => 'AquaWeaver', 'lastname' => 'ryan', 'phonenumber' => '123456', 'bday' => 'Dec. 1 2015', 'address' => 'tere'],
              ['id' => 3, 'firstname' => 'AquaPelham', 'lastname' => 'leanna', 'phonenumber' => '7890123', 'bday' => 'Aug. 20 2015', 'address' => 'tallinn'],
      ];*/
        $data = [
            'contacts' => $contact
        ];
        return new JsonResponse($data);
    }
}