<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PatientController extends AbstractController
{
    #[Route('/patient', name: 'app_patient')]
    public function index(PatientRepository $repo): Response
    {
        $patients =  $repo->findAll();

    return $this->render('patient/index.html.twig', [
        'patients' => $patients,
    ]);
    }
        /**
     * @Route("/patient/new", name="patient_new", methods={"GET","POST"})
     */
    #[Route('/patient',name:'patient_new')]
    public function new(PatientRepository $repo,Request $request, EntityManagerInterface
    $entityManager) 
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $patient = $form->getData();

            $entityManager->persist($patient);
            $entityManager->flush();

            return $this->redirectToRoute('patient_index');
        }

        return $this->render('patient/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/patient/{id}", name="patient_show", methods={"GET"})
     */
    #[Route('/patient',name:'patient_show')]

    public function show(Patient $patient): Response
    {
        return $this->render('patient/show.html.twig', [
            'patient' => $patient,
        ]);
    }

    /**
     * @Route("/patient/{id}/edit", name="patient_edit", methods={"GET","POST"})
     */
    #[Route('/patient',name:'patient_edit')]

    public function edit(Request $request, Patient $patient): Response
    {
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('patient_index');
        }

        return $this->render('patient/edit.html.twig', [
            'patient' => $patient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/patient/{id}", name="patient_delete", methods={"DELETE"})
     */
    #[Route('/patient',name:'patient_delete')]

    public function delete(Request $request, Patient $patient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$patient->getId(), $request->request->get('_token'))) {
            $entityManager->remove($patient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('patient_index');
    }
}
