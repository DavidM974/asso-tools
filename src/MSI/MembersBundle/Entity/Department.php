<?php
namespace MSI\MembersBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity(repositoryClass="MSI\MembersBundle\Repository\DepartmentRepository")
 * @ORM\Table(name="department")
 */
class Department
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
     * @ORM\OneToMany(targetEntity="MSI\MembersBundle\Entity\Services", mappedBy="department")
     */
    private $services;
}