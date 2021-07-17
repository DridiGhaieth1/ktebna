<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ebook
 *
 * @ORM\Table(name="eBook", indexes={@ORM\Index(name="id_category", columns={"id_category"}), @ORM\Index(name="id_author", columns={"id_author"})})
 * @ORM\Entity
 */
class Ebook
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=30, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=30, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=30, nullable=false)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=30, nullable=false)
     */
    private $language;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=30, nullable=false)
     */
    private $url;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

    /**
     * @var \Author
     *
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_author", referencedColumnName="id")
     * })
     */
    private $idAuthor;


}
