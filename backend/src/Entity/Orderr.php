<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orderr
 *
 * @ORM\Table(name="orderr")
 * @ORM\Entity
 */
class Orderr
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="text", length=65535, nullable=false)
     */
    private $status;


}
