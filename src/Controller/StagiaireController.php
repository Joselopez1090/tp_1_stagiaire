<?php

namespace App\Controller;

use App\Entity\Stagiaire;
use App\Repository\StagiaireRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class StagiaireController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function index(Request $request): Response
    {
        return $this->render('stagiaire/index.html.twig');
    }


    #[Route('/listeStagiaire', name: 'listeStagiaire')]
    public function listeStagiaire(Request $request, StagiaireRepository $repository): Response
    {
    $stagiaires = $repository->findAll();
    return $this->render('stagiaire/listeStagiaire.html.twig',['stagiaires'=>$stagiaires]);
    }

    #[Route('/stagiaire/{nom}-{id}', name: 'stagiaire', requirements :['id'=>'\d+','nom'=>'[a-z0-9]+'])]
    public function stagiaire(Request $request, StagiaireRepository $repository, string $nom, int $id): Response
    {
        $stagiaire = $repository->find($id);

        return $this->render('stagiaire/stagiaire.html.twig',['stagiaire'=>$stagiaire, 'id'=>$id,'nom'=>$nom]);
    }

    #[Route('/creerStagiaire', name: 'creation')]
    public function creation(Request $request, EntityManagerInterface $em): Response
    {
//     $stagiaire = new Stagiaire();
//    $stagiaire
//   ->setNom('Hamal')
//   ->setPrenom('Tarik')
//   ->setAdresse('30 Avenue Arbre Ballon')
//   ->setAge(20)
//   ->setEmail('tariklepuant@gmail.com')
//   ->setDateDeNaissance(new DateTimeImmutable());
//   $em->persist($stagiaire); 

//      $stagiaire2 = new Stagiaire();
//     $stagiaire2
//   ->setNom('Porc')
//   ->setPrenom('Tarek')
//   ->setAdresse('32 Avenue Du Farfadet Puant')
//   ->setAge(25)
//   ->setEmail('farfadetlepuant@gmail.com')
//   ->setDateDeNaissance(new DateTimeImmutable());
//   $em->persist($stagiaire2); 

//   $stagiaire3 = new Stagiaire();
//     $stagiaire3
//   ->setNom('Torc')
//   ->setPrenom('Farek')
//   ->setAdresse('46 Avenue Du Poney Puant')
//   ->setAge(52)
//   ->setEmail('Poneylepuant@gmail.com')
//   ->setDateDeNaissance(new DateTimeImmutable());

//   $em->persist($stagiaire3); 
//   $em->flush();

   return $this->render('stagiaire/creerStagiaire.html.twig');
    }
}