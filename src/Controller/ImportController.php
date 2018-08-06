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
        $em = $this->getDoctrine()->getManager();

        $imports = $em->getRepository(Import::class)->findAll();


        return $this->render("import/index.html.twig", [
            "imports" => $imports
        ]);
    }


    /**
     * @return Response
     *
     * @Route("import/insert")
     */
    public function insert(Request $request)
    {
        $post = $request->request->get();
        $em = $this->getDoctrine()->getManager();

        $import = new Import();

        $import->setName($post["name"]);

        $em->persist();
        $em->flush();

        $lastInsertId = $import->getId();

        if (!empty($lastInsertId)) {
            $csv = new CSV();
            $file = $request->files->get("file");
            $rows = $csv->read($file);
            foreach($rows as $row) {
                $row["nome"];
                $row["email"];
                $row["datanasc"];
                $row["cpf"];
                $row["endereco"];
                $row["cep"];
            }
        }

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
            ->add("file", FileType::class,["label"=>"Arquivo"])
            ->add("Submit", SubmitType::class,["label"=>"Salvar"])
            ->getForm();

        return $this->render("import/form.html.twig", [
            "form" => $form->createView()
        ]);
    }

}