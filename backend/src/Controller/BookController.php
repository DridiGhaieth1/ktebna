<?php


namespace App\Controller;
use App\Entity\Adders;
use App\Entity\Book;
use App\Entity\Owners;
use App\Form\BookType;
use App\Entity\Author;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\BookRepository;
use App\Repository\BookRepositoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/book", name="book")
 */
class BookController extends AbstractController
{

    /**
     * @Route("/index", name="bookk")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'welcome',
            'path' => 'src/Controller/BookController.php',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"post"})
     * @return Response
     */
    public function addBook(Request $request)
    {

        /*
     $data = $request->getContent();
     $encoders = array(new JsonEncoder());
     $serializer = new Serializer([new ObjectNormalizer()], $encoders);
     $p = $serializer->deserialize($data, 'App\Entity\Book', 'json');
     $em= $this->getDoctrine()->getManager();
     $em->persist($p);
     $em->flush();
     $response = new Response('', Response::HTTP_CREATED);
     //Allow all websites
     $response->headers->set('Access-Control-Allow-Origin', '*');
     // You can set the allowed methods too, if you want
     $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, PATCH, OPTIONS');
     return $response;

  */
           $em= $this->getDoctrine()->getManager();
           $data=json_decode($request->getContent(),true);


                   $book=new Book();
                   $book->setTitle($data['title']);
                   $book->setCover($data['cover']);
                   $book->setDescription($data['description']);
                   $book->setLanguage($data['language']);
                   $book->setPhoto($data['photo']);
                   $book->setPrice($data['price']);
                   $book->setValue($data['value']);
                   $book->setYear($data['year']);
               $aut = $em->getRepository(Author::class)->find($data['id_author']);
                   $book->setIdAuthor($aut);

           $em->persist($book);
           $em->flush();

       $response = new JsonResponse($data, 200);
       return $response;

 }


 /**
  * @Route("/get", name="get", methods={"GET"})
  */
    public  function getAllBooks(BookRepository $repository): Response
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
    public  function updateBook(Request $request, $id)
    {
        $em= $this->getDoctrine()->getManager();
        $data = $request->getContent();
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer([new ObjectNormalizer()], $encoders);
        $pV1 = $serializer->deserialize($data, 'App\Entity\Book', 'json');
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
    public function deleteBook($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $author = $em->getRepository(Book::class)->find($id);
        $em->remove($author);
        $em->flush();
        return new Response('', Response::HTTP_OK);
    }

}
