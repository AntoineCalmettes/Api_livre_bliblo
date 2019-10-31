<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiGenreController extends AbstractController
{
    /**
     * @Route("/api/genres", name="api_genres", methods={"GET"})
     */
    public function list(GenreRepository $repo,SerializerInterface $serializer)
    {
        $genres=$repo->findAll();
        $resultat=$serializer->serialize(
            $genres,
            'json',
            [
                'groups'=>['listGenreFull']
            ]
        );

        return new JsonResponse($resultat, Response::HTTP_OK,[],true);
    }

    /**
     * @Route("/api/genres/{id}", name="api_genres_show", methods={"GET"})
     */
    public function show(Genre $genre,SerializerInterface $serializer)
    {
        $resultat=$serializer->serialize(
            $genre,
            'json',
            [
                'groups'=>['listGenreSimple']
            ]
        );

        return new JsonResponse($resultat, Response::HTTP_OK,[],true);
    }

    /**
     * @Route("/api/genres", name="api_genres_create", methods={"POST"})
     */
    public function create(Request $request, Genre $genre, SerializerInterface $serializer, ObjectManager $manager, ValidatorInterface $validate)
    {
        $data =$request->getContent();

        $genre = $serializer->deserialize($data, Genre::class,'json');
        // $errors=$validate->validate($genre);
        // if($errors){
        //     $errorJson = $serializer->serialize($errors,'json');
        //     return new JsonResponse($errorJson,Response::HTTP_BAD_REQUEST,[],true);
        // }
        $manager->persist($genre);
        $manager->flush();

        return new JsonResponse(null, Response::HTTP_CREATED,[
            "location"=>"api/genre/".$genre->getId()
        ],true);
    }

       /**
     * @Route("/api/genres/{id}", name="api_genres_update", methods={"PUT"})
     */
    public function edit(Genre $genre,SerializerInterface $serializer,Request $request,ObjectManager $manager,ValidatorInterface $validate)
    {
        $data = $request->getContent();
        $resultat=$serializer->deserialize($data,Genre::class,'json',['object_to_populate'=>$genre]);
        $errors= $validate->validate($genre);
        if($errors){
            $errorJson = $serializer->serialize($errors,'json');
            return new JsonResponse($errorJson,Response::HTTP_BAD_REQUEST,[],true);
        }
        $manager->persist($genre);
        $manager->flush();

        return new JsonResponse("le genre à était modifié", Response::HTTP_OK,[],true);
    }

        /**
     * @Route("/api/genres/{id}", name="api_genres_delete", methods={"DELETE"})
     */
    public function delete(Genre $genre,SerializerInterface $serializer,Request $request,ObjectManager $manager)
    {

        $manager->remove($genre);
        $manager->flush();

        return new JsonResponse("le genre à était supprimer", Response::HTTP_OK,[],false);
    }
}
