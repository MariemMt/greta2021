<?php

namespace App\Controller;

use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAdController extends AbstractController
{
    /**
     * @Route("/admin/ads/{page}", name="admin_ads_index")
     */
    public function index(AdRepository $repo,$page=1): Response //si on met rien ds l'url il prend par defaut la page 1
    {

        $limit = 5; //nbrs d'enregistrements
        $start = ($page - 1) * $limit;
        //page1 commence à 0
        //page2 commence à 10 $start = (2-1)*$limit (10) =10

        // exemple:  findBy(['author'=>"44"],["rooms"=>desc],nbrs enregistrements, d'ou on part )
        $e = $repo->findBy([],[],$limit,$start); //je veux tout donc je met un tableau vide
        $total_articles = count($repo->findAll());

        $pages= ceil($total_articles/$limit); //donne le nbre total de pages  // ceil arrondi superieur

        return $this->render('admin/ad/index.html.twig', [
            'ads'=>$e,
            'page'=>$page, //c la page sur laquelle je suis
            'pages'=>$pages 
        ]);
    }
}
