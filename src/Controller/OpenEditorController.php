<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OpenEditorController extends AbstractController
{
    public function openEditor(Request $request): Response
    {
        return $this->render('open_editor.html.twig');
    }
}