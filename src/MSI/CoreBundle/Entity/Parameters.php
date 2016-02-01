<?php

namespace MSI\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parameters
 *
 * @ORM\Table(name="parameters")
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\ParametersRepository")
 */
class Parameters
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
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Image", cascade={"persist"})
     */
    protected $logo;
    
        /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Image", cascade={"persist"})
     */
    protected $image_login_1;
    
        /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Image", cascade={"persist"})
     */
    protected $image_login_2;
    
        /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Image", cascade={"persist"})
     */
    protected $image_login_3;


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
     * Set logo
     *
     * @param \MSI\CoreBundle\Entity\Image $logo
     * @return Parameters
     */
    public function setLogo(\MSI\CoreBundle\Entity\Image $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \MSI\CoreBundle\Entity\Image 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set image_login_1
     *
     * @param \MSI\CoreBundle\Entity\Image $imageLogin1
     * @return Parameters
     */
    public function setImageLogin1(\MSI\CoreBundle\Entity\Image $imageLogin1 = null)
    {
        $this->image_login_1 = $imageLogin1;

        return $this;
    }

    /**
     * Get image_login_1
     *
     * @return \MSI\CoreBundle\Entity\Image 
     */
    public function getImageLogin1()
    {
        return $this->image_login_1;
    }

    /**
     * Set image_login_2
     *
     * @param \MSI\CoreBundle\Entity\Image $imageLogin2
     * @return Parameters
     */
    public function setImageLogin2(\MSI\CoreBundle\Entity\Image $imageLogin2 = null)
    {
        $this->image_login_2 = $imageLogin2;

        return $this;
    }

    /**
     * Get image_login_2
     *
     * @return \MSI\CoreBundle\Entity\Image 
     */
    public function getImageLogin2()
    {
        return $this->image_login_2;
    }

    /**
     * Set image_login_3
     *
     * @param \MSI\CoreBundle\Entity\Image $imageLogin3
     * @return Parameters
     */
    public function setImageLogin3(\MSI\CoreBundle\Entity\Image $imageLogin3 = null)
    {
        $this->image_login_3 = $imageLogin3;

        return $this;
    }

    /**
     * Get image_login_3
     *
     * @return \MSI\CoreBundle\Entity\Image 
     */
    public function getImageLogin3()
    {
        return $this->image_login_3;
    }
}
