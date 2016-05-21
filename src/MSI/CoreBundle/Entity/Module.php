<?php
namespace MSI\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\ModuleRepository")
 * @ORM\Table(name="module")
 */
class Module
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
     * @ORM\OneToMany(targetEntity="MSI\CoreBundle\Entity\ModuleActive", mappedBy="module")
     */
    private $moduleActives;
}