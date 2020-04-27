<?php

namespace App\Controller;

use App\Service\ImageService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UploadImageController extends AbstractController
{
    /**
     * @var ImageService
     */
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function upload(Request $request, LoggerInterface $logger): JsonResponse
    {
        $iterator = $request->files->getIterator();

        $imageNames = $this->imageService->saveImages($iterator);

        return new JsonResponse($imageNames);
    }
}