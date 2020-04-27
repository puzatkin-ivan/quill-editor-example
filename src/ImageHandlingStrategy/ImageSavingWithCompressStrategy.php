<?php

namespace App\ImageHandlingStrategy;

use App\ImageOptimizer\ImageOptimizerAdapter;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageSavingWithCompressStrategy implements ImageHandlingStrategyInterface
{
    /**
     * @var string
     */
    private $uploadImageDir;

    /**
     * @var ImageOptimizerAdapter
     */
    private $imageOptimizer;

    public function __construct(string $uploadImageDir, ImageOptimizerAdapter $imageOptimizer)
    {
        $this->uploadImageDir = $uploadImageDir;
        $this->imageOptimizer = $imageOptimizer;
    }

    /**
     * @param UploadedFile $image
     * @return array - image saving information
     */
    public function handle(UploadedFile $image): array
    {
        $newFileName = uniqid('img_') . '.' . $image->guessExtension();

        $image->move($this->uploadImageDir, $newFileName);

        $fullPath = $this->uploadImageDir . '/' . $newFileName;
        $this->imageOptimizer->optimize($fullPath, 45);

        return [ 'name_saving' => $newFileName ];
    }
}