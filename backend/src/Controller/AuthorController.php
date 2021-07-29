<?php


namespace App\Controller;
use App\Entity\Author;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/author", name="author")
 */
class AuthorController extends AbstractController
{

    /**
     * @Route("/index", name="authorr")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'welcome',
            'path' => 'src/Controller/AuthorController.php',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"post"})
     * @return Response
     */
    public function addAuthor(Request $request)
    {
        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $p = $serializer->deserialize($data, 'App\Entity\Author', 'json');
        $em= $this->getDoctrine()->getManager();
        $em->persist($p);
        $em->flush();
        //Allow all websites
        return new Response('', Response::HTTP_CREATED);



    }

    /**
     * @Route("/get", name="get", methods={"GET"})
     */
    public  function getAllAuthor(AuthorRepository $repository): Response
    {
        $list = $repository->findAll();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $data = $serializer->serialize($list, 'json');
        return new Response($data, 200);
    }

    /**
     * @Route("/update/{id}", name="update", methods={"put"})
     *
     */
    public  function updateAuthor(Request $request, $id)
    {
        $em= $this->getDoctrine()->getManager();
        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $pV1 = $serializer->deserialize($data, 'App\Entity\Author', 'json');
        $pV0 = $em->getRepository(Author::class)->find($id);
        $pV0 = $pV1;
        $em->flush();
        return new Response('', Response::HTTP_OK);
    }

    /**
     * @Route("/{id}/delete", name="api_delete", methods={"delete"})
     * @return Response
     *
     */
    public function deleteAuthor($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $author = $em->getRepository(Author::class)->find($id);
        $em->remove($author);
        $em->flush();
        return new Response('', Response::HTTP_OK);
    }



}
