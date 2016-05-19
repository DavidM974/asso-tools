<?php
namespace MSI\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\MainRepository")
 * @ORM\Table(name="association")
 */
class Association
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, name="adress")
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=12, nullable=true, name="phone")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $assoc_number;

    /**
     * @ORM\OneToOne(targetEntity="MSI\CoreBundle\Entity\Parameter", cascade={"persist"})
     * @ORM\JoinColumn(name="parameter_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private $parameter;

    /**
     * @ORM\OneToMany(targetEntity="MSI\CoreBundle\Entity\Church", mappedBy="association")
     */
    private $churchs;

    /**
     * @ORM\OneToMany(targetEntity="MSI\CoreBundle\Entity\ModuleActive", mappedBy="association")
     */
    private $moduleActives;
}