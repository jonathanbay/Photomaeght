<?php

namespace App\Controller\Admin;

use App\Entity\AccueilAnimal;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AccueilAnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AccueilAnimal::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('photo')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
            BooleanField::new('valide'),
        ];
    }
    
}
