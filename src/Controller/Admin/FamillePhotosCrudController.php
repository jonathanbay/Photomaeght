<?php

namespace App\Controller\Admin;

use App\Entity\FamillePhotos;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FamillePhotosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FamillePhotos::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('photo')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];
    }
}
