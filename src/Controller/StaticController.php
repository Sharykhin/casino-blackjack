<?php

namespace Casino\Controller;

class StaticController extends BaseController
{
    public function imageAction($image)
    {
        $file = __DIR__ . '/../../images/' . $image;
        header('Content-type: image/jpeg');
        imagejpeg(imagecreatefromjpeg($file));
    }
}