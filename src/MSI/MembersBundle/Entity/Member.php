<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Members
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\MembersRepository")
 * @Vich\Uploadable
 */
class Member {

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
     * @var string
     *
     * @ORM\Column(name="legalResponsable", type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    protected $legalResponsable = null;

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
     * @ORM\Column(name="family_situation", type="string", length=16, columnDefinition="ENUM('S', 'M', 'V', 'D', 'R')")
     */
    protected $familySituation;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="sex", type="boolean")
     */
    protected $sex;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="image_grant", type="boolean")
     */
    protected $imageGrant;

    /**
     * @var string
     * 
     * @ORM\Column(name="phone", type="string", length=16, nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "Your number must be at least {{ limit }} characters long",
     * )
     */
    protected $phone = null;

    /**
     * @var string
     * 
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
     * @ORM\Column(name="email", type="string", length=16, nullable=true)
     * @Assert\Email
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address = null;

    /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Zipcode", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $zipcode;

    /**
     * @ORM\ManyToOne(targetEntity="MSI\CoreBundle\Entity\City", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="baptism_date", type="string", nullable=true)
     * @Assert\Date()
     */
    protected $baptism_date = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_register_date", type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $first_register_date = null;

    /**
     * @Assert\Image(
     *     maxSize="50k",
     *     maxSizeMessage = "El tamaño maximo de la imagen es de {{ limit }}kb",
     *     maxWidth = 500,
     *     maxHeight = 400,
     *     maxWidthMessage = "message max {{ max_width }}px .",
     *     maxHeightMessage = "message min{{ max_height }}px ",
     *     mimeTypes = {"image/jpeg", "image/png","image/jpg", "image/gif"},
     *     mimeTypesMessage = "Only .jpeg .png .jpg and .gif Extension valide"
     * 
     * )
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="MSI\MembersBundle\Entity\Pro_social_categories", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $professional_social_category;

    /**
     * @var string
     *
     * @ORM\Column(name="born_again_date", type="string", nullable=true)
     * @Assert\Date()
     */
    protected $born_again_date;

    /**
     * @var string
     *
     * @ORM\Column(name="baptism_localisation", type="string", length=255, nullable=true)
     */
    protected $baptism_localisation;

    /**
     * @ORM\ManyToMany(targetEntity="MSI\MembersBundle\Entity\Services", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $services;

    /**
     * @ORM\OneToOne(targetEntity="MSI\MembersBundle\Entity\Member", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $marriedTo;

    /**
     * @ORM\ManyToMany(targetEntity="MSI\MembersBundle\Entity\Child", cascade={"persist"})
     */
    protected $childs;

    public function __construct() {
        $this->childs = new ArrayCollection();
        $this->services = new ArrayCollection();
        if ($this->first_register_date == null) {
            $this->first_register_date = new \DateTime();
        }
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Members
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set legalResponsable
     *
     * @param string $legalResponsable
     * @return Members
     */
    public function setLegalResponsable($legalResponsable) {
        $this->legalResponsable = $legalResponsable;

        return $this;
    }

    /**
     * Get legalResponsable
     *
     * @return string 
     */
    public function getLegalResponsable() {
        return $this->legalResponsable;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Members
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     * @return Members
     */
    public function setBirth($birth) {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime 
     */
    public function getBirth() {
        return $this->birth;
    }

    /**
     * Set family_situation
     *
     * @param string $familySituation
     * @return Members
     */
    public function setFamilySituation($familySituation) {
        $this->familySituation = $familySituation;

        return $this;
    }

    /**
     * Get familySituation
     *
     * @return string 
     */
    public function getFamilySituation() {
        return $this->familySituation;
    }

    /**
     * Set sex
     *
     * @param boolean $sex
     * @return Members
     */
    public function setSex($sex) {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean 
     */
    public function getSex() {
        return $this->sex;
    }

    /**
     * Set sex
     *
     * @param boolean $imageGrant
     * @return Members
     */
    public function setImageGrant($imageGrant) {
        $this->imageGrant = $imageGrant;

        return $this;
    }

    /**
     * Get imageGrant
     *
     * @return boolean 
     */
    public function getImageGrant() {
        return $this->imageGrant;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Members
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Members
     */
    public function setMobile($mobile) {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile() {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Members
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Members
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set baptism_date
     *
     * @param \Date $baptismDate
     * @return Members
     */
    public function setBaptismDate($baptismDate) {
        $this->baptism_date = $baptismDate;

        return $this;
    }

    /**
     * Get baptism_date
     *
     * @return \Date
     */
    public function getBaptismDate() {
        return $this->baptism_date;
    }

    /**
     * Set first_register_date
     *
     * @param \DateTime $firstRegisterDate
     * @return Members
     */
    public function setFirstRegisterDate($firstRegisterDate) {

        $this->first_register_date = $firstRegisterDate;

        return $this;
    }

    /**
     * Get first_register_date
     *
     * @return \DateTime 
     */
    public function getFirstRegisterDate() {
        return $this->first_register_date;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return File
     */
    public function setImageFile(File $image = null) {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile() {
        return $this->imageFile;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Members
     */
    public function setImageName($imageName) {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName() {
        return $this->imageName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Members
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set born_again_date
     *
     * @param \Date $bornAgainDate
     * @return Members
     */
    public function setBornAgainDate($bornAgainDate) {
        $this->born_again_date = $bornAgainDate;

        return $this;
    }

    /**
     * Get born_again_date
     *
     * @return \Date
     */
    public function getBornAgainDate() {
        return $this->born_again_date;
    }

    /**
     * Set baptism_localisation
     *
     * @param string $baptismLocalisation
     * @return Members
     */
    public function setBaptismLocalisation($baptismLocalisation) {
        $this->baptism_localisation = $baptismLocalisation;

        return $this;
    }

    /**
     * Get baptism_localisation
     *
     * @return string 
     */
    public function getBaptismLocalisation() {
        return $this->baptism_localisation;
    }

    /**
     * Set zipcode
     *
     * @param \MSI\CoreBundle\Entity\Zipcode $zipcode
     * @return Members
     */
    public function setZipcode(\MSI\CoreBundle\Entity\Zipcode $zipcode) {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return \MSI\CoreBundle\Entity\Zipcode 
     */
    public function getZipcode() {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param \MSI\CoreBundle\Entity\City $city
     * @return Members
     */
    public function setCity(\MSI\CoreBundle\Entity\City $city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \MSI\CoreBundle\Entity\City 
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set professional_social_category
     *
     * @param \MSI\MembersBundle\Entity\Pro_social_categories $professionalSocialCategory
     * @return Members
     */
    public function setProfessionalSocialCategory(\MSI\MembersBundle\Entity\Pro_social_categories $professionalSocialCategory) {
        $this->professional_social_category = $professionalSocialCategory;

        return $this;
    }

    /**
     * Get professional_social_category
     *
     * @return \MSI\MembersBundle\Entity\Pro_social_categories 
     */
    public function getProfessionalSocialCategory() {
        return $this->professional_social_category;
    }

    /**
     * Set services
     *
     * @param \MSI\MembersBundle\Entity\Services $service
     * @return Members
     */
    public function addService(\MSI\MembersBundle\Entity\Services $service = null) {
        $this->services[] = $service;

        return $this;
    }

    public function removeService(\MSI\MembersBundle\Entity\Services $service) {
        $this->services->removeElement($service);
    }

    /**
     * Get services
     *
     * @return \MSI\MembersBundle\Entity\Services 
     */
    public function getServices() {
        return $this->services;
    }

    /**
     * Set child
     *
     * @param \MSI\MembersBundle\Entity\Child $child
     * @return Members
     */
    public function addChild(\MSI\MembersBundle\Entity\Child $child = null) {
        $this->childs[] = $child;

        return $this;
    }

    public function removeChild(\MSI\MembersBundle\Entity\Child $child) {
        $this->childs->removeElement($child);
    }

    /**
     * Get childs
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChilds() {
        return $this->childs;
    }

    /**
     * Set marriedTo
     *
     * @param \MSI\MembersBundle\Entity\Member $marriedTo
     * @return Members
     */
    public function setMarriedTo(\MSI\MembersBundle\Entity\Member $marriedTo = null) {
        $this->marriedTo = $marriedTo;

        return $this;
    }

    /**
     * Get marriedTo
     *
     * @return \MSI\MembersBundle\Entity\Member 
     */
    public function getMarriedTo() {
        return $this->marriedTo;
    }

}
