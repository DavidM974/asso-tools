<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pro_social_categories
 *
 * @ORM\Table(name="pro_social_categories")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\Pro_social_categoriesRepository")
 */
class Pro_social_categories {

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
     * @return Pro_social_categories
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
