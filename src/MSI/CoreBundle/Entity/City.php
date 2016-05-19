<?php

namespace MSI\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\CityRepository")
 */
class City
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="MSI\CoreBundle\Entity\Zipcode", cascade={"persist"})
     * @ORM\JoinColumn(name="zipcode_id", referencedColumnName="id", nullable=false)
     */
    protected $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="label")
     */
    private $label;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return City
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
    
    /**
     * Set zipcode
     *
     * @param \MSI\CoreBundle\Entity\Country $country
     * @return City
     */
    public function setZipcode(\MSI\CoreBundle\Entity\Zipcode $country = null)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return \MSI\CoreBundle\Entity\Zipcode 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }
}
