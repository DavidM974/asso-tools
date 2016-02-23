<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Family_situations
 *
 * @ORM\Table(name="family_situations")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\Family_situationsRepository")
 */
class Family_situations {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
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
     * @return Family_situations
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
