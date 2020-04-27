<?php

namespace App\Service;

use App\ImageHandlingStrategy\ImageHandlingStrategyInterface;
use App\ImageHandlingStrategy\ImageSavingWithCompressStrategy;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageService
{
    /**
     * @var ImageHandlingStrategyInterface
     */
    private $imageHandlingStrategy;

    public function __construct(ImageHandlingStrategyInterface $imageHandlingStrategy)
    {
        $this->imageHandlingStrategy = $imageHandlingStrategy;
    }

    public function saveImages(\ArrayIterator $iterator): array
    {
        $imageNames = [];

        /** @var UploadedFile $image */
        foreach ($iterator as $image)
        {
            $imageHandlingInfo = $this->imageHandlingStrategy->handle($image);

            $imageNames[] = $imageHandlingInfo['name_saving'];
        }

        return $imageNames;
    }
}