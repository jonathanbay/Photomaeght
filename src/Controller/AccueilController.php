<?php

namespace App\Controller;

use App\Entity\Carrousel;
use App\Form\ContactType;
use App\Entity\Informations;
use App\Entity\AccueilAnimal;
use App\Entity\AccueilEnfant;
use App\Entity\AccueilFamille;
use App\Entity\AccueilMariage;
use App\Entity\AccueilEvenement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class AccueilController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'app_accueil')]

    public function index(Request $request, MailerInterface $mailer): Response
    {

        $photosCarrousel = $this->entityManager->getRepository(Carrousel::class)->findAll();
        $photoAccueilMariage = $this->entityManager->getRepository(AccueilMariage::class)->findByValide(1);
        $photoAccueilFamille = $this->entityManager->getRepository(AccueilFamille::class)->findByValide(1);
        $photoAccueilEvenement = $this->entityManager->getRepository(AccueilEvenement::class)->findByValide(1);
        $photoAccueilEnfant = $this->entityManager->getRepository(AccueilEnfant::class)->findByValide(1);
        $photoAccueilAnimal = $this->entityManager->getRepository(AccueilAnimal::class)->findByValide(1);

        $informations = $this->entityManager->getRepository(Informations::class)->findAll();  

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('notice', 'Votre demande a bien etait envoyée, je vous répondrais dans les plus brefs delai');

            $email = (new TemplatedEmail())
                ->from($form->get('email')->getData())
                ->to('bayjon62@yahoo.com')
                ->subject('Demande de renseignements')
                ->htmlTemplate('emails/renseignement.html.twig')
                ->context([
                    'nom' => $form->get('nom')->getData(),
                    'prenom' => $form->get('prenom')->getData(),
                    'telephone' => $form->get('telephone')->getData(),
                    'mail' => $form->get('email')->getData(),
                    'message' => $form->get('contenu')->getData()
                ]);
            $mailer->send($email);

            
        }
        

        return $this->render('accueil/index.html.twig', [

            'carrousel' => $photosCarrousel,
            'photoAccueilMariage' => $photoAccueilMariage,
            'photoAccueilFamille' => $photoAccueilFamille,
            'photoAccueilEvenement' => $photoAccueilEvenement,
            'photoAccueilEnfant' => $photoAccueilEnfant,
            'photoAccueilAnimal' => $photoAccueilAnimal,
            'information' => $informations,
            'form' => $form->createView(),
        ]);
    }
}
