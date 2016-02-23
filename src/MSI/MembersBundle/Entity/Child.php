<?php

namespace MSI\MembersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Child
 *
 * @ORM\Table(name="child")
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\ChildRepository")
 */
class Child {

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
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $birth = null;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="sex", type="boolean")
     */
    protected $sex;

    /**
     * @ORM\OneToOne(targetEntity="MSI\MembersBundle\Entity\Scolar_categories", cascade={"persist"})
     */
    protected $scolar_category;

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
     * @return Child
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
     * @return Child
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
     * @return Child
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
     * Set sex
     *
     * @param boolean $sex
     * @return Child
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set scolar_category
     *
     * @param \MSI\MembersBundle\Entity\Scolar_categories $scolarCategory
     * @return Child
     */
    public function setScolarCategory(\MSI\MembersBundle\Entity\Scolar_categories $scolarCategory = null)
    {
        $this->scolar_category = $scolarCategory;

        return $this;
    }

    /**
     * Get scolar_category
     *
     * @return \MSI\MembersBundle\Entity\Scolar_categories 
     */
    public function getScolarCategory()
    {
        return $this->scolar_category;
    }
}
