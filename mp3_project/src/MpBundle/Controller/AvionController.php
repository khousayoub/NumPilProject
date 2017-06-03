<?php

namespace MpBundle\Controller;

use MpBundle\Entity\Avion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Avion controller.
 *
 * @Route("avion")
 */
class AvionController extends Controller
{
    /**
     * Lists all avion entities.
     *
     * @Route("/", name="avion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avions = $em->getRepository('MpBundle:Avion')->findAll();

        return $this->render('avion/index.html.twig', array(
            'avions' => $avions,
        ));
    }

    /**
     * Creates a new avion entity.
     *
     * @Route("/new", name="avion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $avion = new Avion();
        $form = $this->createForm('MpBundle\Form\AvionType', $avion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avion);
            $em->flush();

            return $this->redirectToRoute('avion_index');
        }

        return $this->render('avion/new.html.twig', array(
            'avion' => $avion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a avion entity.
     *
     * @Route("/{id}", name="avion_show")
     * @Method("GET")
     */
    public function showAction(Avion $avion)
    {
        $deleteForm = $this->createDeleteForm($avion);

        return $this->render('avion/show.html.twig', array(
            'avion' => $avion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing avion entity.
     *
     * @Route("/{id}/edit", name="avion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Avion $avion)
    {
        $deleteForm = $this->createDeleteForm($avion);
        $editForm = $this->createForm('MpBundle\Form\AvionType', $avion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avion_edit', array('id' => $avion->getId()));
        }

        return $this->render('avion/edit.html.twig', array(
            'avion' => $avion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a avion entity.
     *
     * @Route("/{id}/delete", name="avion_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
            $em = $this->getDoctrine()->getManager();
            $rep = $em->getRepository("MpBundle:Avion");
            $avionID = $rep->find($id);
            $em->remove($avionID);
            $em->flush();

        return $this->redirectToRoute('avion_index');
    }

    /**
     * Creates a form to delete a avion entity.
     *
     * @param Avion $avion The avion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Avion $avion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avion_delete', array('id' => $avion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
