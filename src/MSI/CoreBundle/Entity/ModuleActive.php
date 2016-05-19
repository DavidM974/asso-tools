<?php
namespace MSI\CoreBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\ModuleActiveRepository")
 * @ORM\Table(name="module_active")
 */
class ModuleActive
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true, name="isActive")
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="MSI\CoreBundle\Entity\Association", inversedBy="moduleActives")
     * @ORM\JoinColumn(name="main_id", referencedColumnName="id", nullable=false)
     */
    private $association;

    /**
     * @ORM\ManyToOne(targetEntity="MSI\CoreBundle\Entity\Module", inversedBy="moduleActives")
     * @ORM\JoinColumn(name="module_id", referencedColumnName="id", nullable=false)
     */
    private $module;
}