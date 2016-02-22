<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Family_situations
 *
 * @ORM\Table(name="family_situations")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\Family_situationsRepository")
 */
class Family_situations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
