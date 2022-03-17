<?php

namespace App\Controller;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use App\Repository\OuvrierRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


//use Symfony\Polyfill\Intl\Normalizer\Normalizer as NormalizerNormalizer;

class ApiOvrierController extends AbstractController
{
    #[Route('/api/ovrier', name: 'app_api_ovrier')]
    public function index(OuvrierRepository $ouvrierRepository, SerializerInterface $serializerInterface): Response
    {
        $allouvrier = $ouvrierRepository->findAll();

        $normalizerouv = $serializerInterface->serialize($allouvrier, 'json');
        //$json = json_encode($allouvrier);
        dd($normalizerouv);
    }

    #[Route('/api/company', name: 'app_api_company')]
    public function apicompany(CompanyRepository $companyrepository): Response
    {
        //$allcompany = $companyrepository->findAll();
        //$seriacompany = $serializerInterface->serialize($allcompany, 'json');
        //$json = json_encode($allouvrier);
        //dd($seriacompany);
        return $this->json($companyrepository->findAll(), 200, []);

        // $response = new Response($seriacompany, 200, [
        //    "content-type" => "application/json"
        //]);
        //return $response;
    }

    #[Route('/api/pcompany', name: 'app_api_pcompany')]
    public function apistor(Request $request, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface)
    {
        $jsonrecu = $request->getContent();
        $compsny = $serializerInterface->deserialize($jsonrecu, Company::class, 'json');
        $entityManagerInterface->persist($compsny);
        $entityManagerInterface->flush();
        dd($compsny);
        //return $this->json($jsonrecu, 200, []);
    }
}
