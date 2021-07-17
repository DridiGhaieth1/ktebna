<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inovice
 *
 * @ORM\Table(name="inovice")
 * @ORM\Entity
 */
class Inovice
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
     * @ORM\Column(name="status", type="text", length=65535, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;


}
