<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scolar_categories
 *
 * @ORM\Table(name="scolar_categories")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\Scolar_categoriesRepository")
 */
class Scolar_categories
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
