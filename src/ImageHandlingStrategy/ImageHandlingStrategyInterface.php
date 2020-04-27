<?php

namespace App\ImageHandlingStrategy;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface ImageHandlingStrategyInterface
{
    /**
     * @param UploadedFile $image
     * @return array - image handling information
     */
    public function handle(UploadedFile $image): array;
}