<?php

namespace App\Controller\Admin;

use App\Entity\AnimauxPhotos;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnimauxPhotosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AnimauxPhotos::class;
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
