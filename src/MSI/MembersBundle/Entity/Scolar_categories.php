<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scolar_categories
 *
 * @ORM\Table(name="scolar_categories")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\Scolar_categoriesRepository")
 */
class Scolar_categories {

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="label")
     */
    protected $label;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set label
     *
     * @param string $label
     * @return Scolar_categories
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }
}
