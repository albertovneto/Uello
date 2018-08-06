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

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDirectory(), $fileName);

        return $fileName;
    }

    public function read($archive)
    {
        $rowNo = 1;
        if (($fp = fopen($archive, "r")) !== FALSE) {
            while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                $num = count($row);
                echo "<p> $num fields in line $rowNo: <br /></p>\n";
                $rowNo++;
                for ($c=0; $c < $num; $c++) {
                    echo $row[$c] . "<br />\n";
                }
            }
            fclose($fp);
        }
    }

    public function write()
    {
        $list = array (
            array('aaa', 'bbb', 'ccc', 'dddd'),
            array('123', '456', '789', '102'),
            array('"aaa"', '"bbb"')
        );

        $fp = fopen("sample.csv", "w");

        foreach ($list as $line)
        {
            fputcsv(
                $fp, // The file pointer
                $line, // The fields
                ',' // The delimiter
            );
        }

        fclose($fp);
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}