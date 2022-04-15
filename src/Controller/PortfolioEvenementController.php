<?php

namespace App\Controller;

use App\Entity\PortfolioEvenement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioEvenementController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/portfolio/evenement', name: 'app_portfolio_evenement')]
    public function index(): Response
    {

        $evenement = $this->entityManager->getRepository(PortfolioEvenement::class)->findAll();

        return $this->render('portfolio_evenement/index.html.twig', [
            'photosEvenement' => $evenement,
        ]);
    }
}
