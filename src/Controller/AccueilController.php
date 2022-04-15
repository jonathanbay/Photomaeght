<?php

namespace App\Controller;

use App\Entity\AccueilAnimal;
use App\Entity\AccueilEnfant;
use App\Entity\AccueilEvenement;
use App\Entity\AccueilFamille;
use App\Entity\AccueilMariage;
use App\Entity\Carrousel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $photosCarrousel = $this->entityManager->getRepository(Carrousel::class)->findAll();
        $photoAccueilMariage = $this->entityManager->getRepository(AccueilMariage::class)->findByValide(1);
        $photoAccueilFamille = $this->entityManager->getRepository(AccueilFamille::class)->findByValide(1);
        $photoAccueilEvenement = $this->entityManager->getRepository(AccueilEvenement::class)->findByValide(1);
        $photoAccueilEnfant = $this->entityManager->getRepository(AccueilEnfant::class)->findByValide(1);
        $photoAccueilAnimal = $this->entityManager->getRepository(AccueilAnimal::class)->findByValide(1);

        return $this->render('accueil/index.html.twig', [

            'carrousel' => $photosCarrousel,
            'photoAccueilMariage' => $photoAccueilMariage,
            'photoAccueilFamille' => $photoAccueilFamille,
            'photoAccueilEvenement' => $photoAccueilEvenement,
            'photoAccueilEnfant' => $photoAccueilEnfant,
            'photoAccueilAnimal' => $photoAccueilAnimal,
        ]);
    }
}
