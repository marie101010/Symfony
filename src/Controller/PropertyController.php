<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class PropertyController extends AbstractController{

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository ;
        $this->em = $em;
    }
    /**
     * @Route("/biens",name="property.index")
     * @return Response
     */
    public function index() : Response
        {
            return $this->render('property/index.html.twig',[
                'current_menu' => 'properties'
            ]);
        }
/**
 * @Route ("/biens/{slug}-{id}",name="property.show", requirements={"slug": "[a-z0-9\-]*"})
 */

    public function show($slug, $id ): Response{
        $property = $this->repository->find($id);
            if ($property->getSlug() !== $slug) {
                return $this->redirectToRoute('property.show',[
                    'id' => $property->getId(),
                    'slug' => $property->getSlug()
                    ], 301);
                }
            return $this->render('property/show.html.twig', [
                'property' => $property,
                'current_menu' => 'properties'
            ]);
        }
    }