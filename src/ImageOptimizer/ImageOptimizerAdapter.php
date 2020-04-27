<?php

namespace App\ImageOptimizer;


class ImageOptimizerAdapter
{
    /**
     * @var ImageOptimizer
     */
    private $optimizer;

    public function __construct()
    {
        $this->optimizer = new ImageOptimizer();
    }

    public function optimize(string $pathToImage, int $quality): void
    {
        $this->optimizer->optimize($pathToImage, $quality);
    }
}