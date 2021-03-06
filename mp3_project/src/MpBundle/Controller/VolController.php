<?php

namespace MpBundle\Controller;

use MpBundle\Entity\Vol;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vol controller.
 *
 * @Route("vol")
 */
class VolController extends Controller
{
    /**
     * Lists all vol entities.
     *
     * @Route("/", name="vol_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vols = $em->getRepository('MpBundle:Vol')->findAll();

        return $this->render('vol/index.html.twig', array(
            'vols' => $vols,
        ));
    }

    /**
     * Creates a new vol entity.
     *
     * @Route("/new", name="vol_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("MpBundle:Avion");
        $avion = $rep->findAll();

        $vol = new Vol();
        $form = $this->createForm('MpBundle\Form\VolType', $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($vol);
            $em->flush();

            return $this->redirectToRoute('vol_index');
        }

        return $this->render('vol/new.html.twig', array(
            'vol' => $vol,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vol entity.
     *
     * @Route("/{id}", name="vol_show")
     * @Method("GET")
     */
    public function showAction(Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);

        return $this->render('vol/show.html.twig', array(
            'vol' => $vol,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vol entity.
     *
     * @Route("/{id}/edit", name="vol_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);
        $editForm = $this->createForm('MpBundle\Form\VolType', $vol);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vol_edit', array('id' => $vol->getId()));
        }

        return $this->render('vol/edit.html.twig', array(
            'vol' => $vol,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vol entity.
     *
     * @Route("/{id}", name="vol_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vol $vol)
    {
        $form = $this->createDeleteForm($vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vol);
            $em->flush();
        }

        return $this->redirectToRoute('vol_index');
    }

    /**
     * Creates a form to delete a vol entity.
     *
     * @param Vol $vol The vol entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vol $vol)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vol_delete', array('id' => $vol->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
