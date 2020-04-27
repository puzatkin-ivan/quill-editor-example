<?php

namespace App\ImageOptimizer;

class ImageOptimizer
{
    public function optimize(string $pathToImage, int $quality): void
    {
        $info = getimagesize($pathToImage);

        switch ($info['mime'])
        {
            case 'image/jpeg':
                $this->optimizeJPG($pathToImage, $quality);
                break;
            case 'image/png':
                $this->optimizePNG($pathToImage, $quality);
                break;
            default:
                throw new \Exception("Unknown mime type files");
        }
    }

    private function optimizeJPG(string $pathToImage, int $quality): void
    {
        $image = imagecreatefromjpeg($pathToImage);

        ob_start();
        imagejpeg($image, null, $quality);
        $image_data = ob_get_contents();
        ob_end_clean();
        file_put_contents($pathToImage, $image_data);
    }

    private function optimizePNG(string $pathToImage, int $quality): void
    {
        $image = imagecreatefrompng($pathToImage);

        ob_start();
        imagepng($image, null, $quality / 10);
        $image_data = ob_get_contents();
        ob_end_clean();
        file_put_contents($pathToImage, $image_data);
    }
}