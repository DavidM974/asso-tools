<?php

namespace MSI\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of User
 *
 * @author David
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    protected $firstname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    protected $lastname = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $birth = null;

    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=16, columnDefinition="ENUM('M', 'MME', 'MLLE')")
     */
    protected $civility;

    /**
     * @var string
     * @ORM\Column(name="phone", type="string", length=16, nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "Your number must be at least {{ limit }} characters long",
     * )
     */
    protected $phone = null;

    /**
     * @var string
     * @ORM\Column(name="mobile", type="string", length=16, nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "Your number must be at least {{ limit }} characters long",
     * )
     */
    protected $mobile = null;
    
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address = null;
    
    /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Image", cascade={"persist"})
     */
    protected $image;
    
    /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Zipcode", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $zipcode;
    
    /**
    * @ORM\Column(name="locale", type="string", length=16)
    */
  protected $locale = 'fr';
    

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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     * @return User
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime 
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set civility
     *
     * @param string $civility
     * @return User
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get civility
     *
     * @return string 
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set image
     *
     * @param \MSI\CoreBundle\Entity\Image $image
     * @return User
     */
    public function setImage(\MSI\CoreBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \MSI\CoreBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set zipcode
     *
     * @param \MSI\CoreBundle\Entity\Zipcode $zipcode
     * @return User
     */
    public function setZipcode(\MSI\CoreBundle\Entity\Zipcode $zipcode)
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

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
    public function getLocale() {
        return $this->locale;
    }

    public function setLocale($param = 'fr') {
        $this->locale = $param;
        return;
    }

    public function __construct() {
        parent::__construct();
        // your own logic
    }

}
