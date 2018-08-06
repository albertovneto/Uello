<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class CSV
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function read($archive)
    {
        if (($fp = fopen($archive["tmp_name"], "r")) !== FALSE) {
            while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                $conteudo[] = $row;
            }
            fclose($fp);
            return $conteudo;
        }
    }

    public function write($list,$file)
    {

        $fp = fopen($file, "w");

        foreach ($list as $line)
        {
            fputcsv(
                $fp,
                $line,
                ','
            );
        }

        fclose($fp);
    }
}