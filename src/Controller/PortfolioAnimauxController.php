<?php

namespace App\Controller;

use App\Entity\Informations;
use App\Entity\AnimauxPhotos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioAnimauxController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/portfolio/animaux', name: 'app_portfolio_animaux')]
    public function index(): Response
    {

        $animaux = $this->entityManager->getRepository(AnimauxPhotos::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('portfolio_animaux/index.html.twig', [
            'photosAnimaux' => $animaux,
            'information' => $informations,
        ]);
    }
}
