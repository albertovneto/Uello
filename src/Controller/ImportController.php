<?php

namespace App\Controller;


use App\Entity\Import;
use function Sodium\add;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CSV;

class ImportController extends Controller
{
    /**
     * @return Response
     *
     * @Route("import")
     */
    public function index()
    {

        return $this->render("import/insert.html.twig", [
            "msg" => "Olá Uello"
        ]);
    }


    /**
     * @return Response
     *
     * @Route("import/insert")
     */
    public function insert()
    {
        $em = $this->getDoctrine()->getManager();

        $import = new Import();
        $url = "teste";

        $import->setName("Primeira Importação de arquivos");

        $em->persist();
        $em->flush();
        $csv = new CSV();

        $csv->read();
        #$lastInsertId = $import->getId();

    }

    /**
     * @return Response
     *
     * @Route("import/form")
     */
    public function form()
    {

        $form = $this->createFormBuilder()
            ->add("name", TextType::class,["label"=>"Nome"])
            ->add("archive", FileType::class,["label"=>"Arquivo"])
            ->add("Submit", SubmitType::class,["label"=>"Salvar"])
            ->getForm();

        return $this->render("import/form.html.twig", [
            "form" => $form->createView()
        ]);
    }

}