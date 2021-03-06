<?php


namespace App\Controller;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/category", name="category")
 */
class CategoryController extends AbstractController
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
     * @Route("/get", name="get", methods={"GET"})
     */
    public  function getAllCat(CategoryRepository $repository): Response
    {
        $list = $repository->findAll();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $data = $serializer->serialize($list, 'json');
        return new Response($data, 200);
    }

    /**
     * @Route("/add", name="add", methods={"post"})
     * @return Response
     */
    public function addCat(Request $request)
    {
        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $p = $serializer->deserialize($data, 'App\Entity\Category', 'json');
        $em= $this->getDoctrine()->getManager();
        $em->persist($p);
        $em->flush();
        return new Response('', Response::HTTP_CREATED);
    }


}
