<?php
/**
 * Created by PhpStorm.
 * User: Olaf
 * Date: 5.01.2017
 * Time: 12:26
 */

namespace AppBundle\Controller;

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
        return $this->render('contactform/list.html.twig');
    }
    /**
     * @Route("/contactform/list/contacts", name="contact_contacts")
     * @Method("GET")
     */
    public function getContactsAction()
    {
        $contact = [
            ['id' => 1, 'firstname' => 'AquaPelham', 'lastname' => 'lolita', 'phonenumber' => '55543210', 'bday' => 'Dec. 10 2015', 'address' => 'Pikk 7-2'],
            ['id' => 2, 'firstname' => 'AquaWeaver', 'lastname' => 'ryan', 'phonenumber' => '123456', 'bday' => 'Dec. 1 2015', 'address' => ''],
            ['id' => 3, 'firstname' => 'AquaPelham', 'lastname' => 'leanna', 'phonenumber' => '7890123', 'bday' => 'Aug. 20 2015', 'address' => 'tallinn'],
    ];
        $data = [
            'contact' => $contact
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