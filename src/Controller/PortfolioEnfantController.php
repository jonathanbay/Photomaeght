<?php

namespace App\Controller;

use App\Entity\EnfantPhotos;
use App\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PortfolioEnfantController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/portfolio/enfant', name: 'app_portfolio_enfant')]
    public function index(): Response
    {
        $enfant = $this->entityManager->getRepository(EnfantPhotos::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('portfolio_enfant/index.html.twig', [
            'photosEnfant' => $enfant,
            'information' => $informations,
        ]);
    }
}