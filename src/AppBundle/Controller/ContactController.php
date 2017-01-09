<?php
/**
 * Created by PhpStorm.
 * User: Olaf
 * Date: 5.01.2017
 * Time: 12:26
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Contacts;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/contactform/", name="contact_index")
     */
    public function indexAction()
    {
        return $this->render('contactform/index.html.twig');
    }
    /**
     * @Route("/contactform/new")
     */
    public function newAction()
    {
        $contact = new Contacts();
        $contact->setfirstname('Octopus'.rand(1, 100));
        $contact->setlastname('Octopodinae');
        $contact->setbday(1388516401);
        $contact->setphonenumber(rand(100, 99999));
        $contact->setaddress('');
        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        return new Response('<html><body>Contact created!</body></html>');
    }

    /**
     * @Route("/contactform/insert", name="contact_insert")
     */
    public function insertAction()
    {
        return $this->render('contactform/insert.html.twig');
    }


    /**
     * @Route("/contactform/list/edit", name="contact_edit")
     */
    public function removeAction()
    {
        return $this->render('contactform/edit.html.twig');
    }


    /**
     * @Route("/contactform/list/remove", name="contact_remove")
     */
    public function editAction()
    {
        return $this->render('contactform/edit.html.twig');
    }


    /**
     * @Route("/contactform/list/", name="contact_list")
     */
    public function listAction()
    {
        $em = $this ->getDoctrine()->getManager();
        $contacts = $em->getRepository('AppBundle:Contacts')
            ->findAll();
        dump($contacts);die;
        return $this->render('contactform/list.html.twig');
    }
    /**
     * @Route("/contactform/list/contacts", name="contact_contacts")
     * @Method("GET")
     */
    public function getContactsAction()
    {
        $contact = [
            ['id' => 1, 'firstname' => 'AquaPelham', 'lastname' => 'lala', 'phonenumber' => '6543210', 'bday' => 'Dec. 10 2015', 'address' => 'tartu'],
            ['id' => 2, 'firstname' => 'AquaWeaver', 'lastname' => 'ryan', 'phonenumber' => '123456', 'bday' => 'Dec. 1 2015', 'address' => ''],
            ['id' => 3, 'firstname' => 'AquaPelham', 'lastname' => 'leanna', 'phonenumber' => '7890123', 'bday' => 'Aug. 20 2015', 'address' => 'tallinn'],
    ];
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