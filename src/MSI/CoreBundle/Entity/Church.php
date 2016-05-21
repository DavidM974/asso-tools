<?php
namespace MSI\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\ChurchRepository")
 * @ORM\Table(name="church")
 */
class Church
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
     * @ORM\ManyToOne(targetEntity="MSI\CoreBundle\Entity\Association", inversedBy="churchs")
     * @ORM\JoinColumn(name="main_id", referencedColumnName="id", nullable=false)
     */
    private $main;
}