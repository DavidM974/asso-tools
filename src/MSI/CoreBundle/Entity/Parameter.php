<?php

namespace MSI\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Parameter
 *
 * @ORM\Table(name="parameter")
 * @ORM\Entity(repositoryClass="MSI\CoreBundle\Repository\ParameterRepository")
 * @Vich\Uploadable
 */
class Parameter {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\Image(
     *     maxSize="1M",
     *     maxSizeMessage = "msi.core.parameter.logofile.size",
     *     maxWidth = 200,
     *     maxHeight = 100,
     *     maxWidthMessage = "msi.core.parameter.logofile.width.max",
     *     maxHeightMessage = "msi.core.parameter.logofile.height.max",
     *     minWidth = 30,
     *     minHeight = 30,
     *     minWidthMessage = "msi.core.parameter.logofile.width.min",
     *     minHeightMessage = "msi.core.parameter.logofile.height.min",
     *     mimeTypes = {"image/jpeg", "image/png","image/jpg"},
     *     mimeTypesMessage = "msi.core.parameter.logofile.type"
     * )
     * @Vich\UploadableField(mapping="parameters_image", fileNameProperty="logoName")
     * 
     * @var File
     */
    private $logoFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $logoName;

    /**
     * @Assert\Image(
     *     maxSize="1M",
     *     maxSizeMessage = "msi.core.parameter.imagelogin1.size",
     *     maxWidth = 1080,
     *     maxHeight = 1200,
     *     maxWidthMessage = "msi.core.parameter.imagelogin1.width.max",
     *     maxHeightMessage = "msi.core.parameter.imagelogin1.height.max",
     *     minWidth = 540,
     *     minHeight = 600,
     *     minWidthMessage = "msi.core.parameter.imagelogin1.width.min",
     *     minHeightMessage = "msi.core.parameter.imagelogin1.height.min",
     *     mimeTypes = {"image/jpeg", "image/png","image/jpg"},
     *     mimeTypesMessage = "msi.core.parameter.imagelogin1.type"
     * )
     * @Vich\UploadableField(mapping="parameters_image", fileNameProperty="imageLogin1Name")
     * 
     * @var File
     */
    private $imageLogin1File;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageLogin1Name;

    /**
     * @Assert\Image(
     *     maxSize="1M",
     *     maxSizeMessage = "msi.core.parameter.imagelogin2.size",
     *     maxWidth = 1080,
     *     maxHeight = 1200,
     *     maxWidthMessage = "msi.core.parameter.imagelogin2.width.max",
     *     maxHeightMessage = "msi.core.parameter.imagelogin2.height.max",
     *     minWidth = 540,
     *     minHeight = 600,
     *     minWidthMessage = "msi.core.parameter.imagelogin2.width.min",
     *     minHeightMessage = "msi.core.parameter.imagelogin2.height.min",
     *     mimeTypes = {"image/jpeg", "image/png","image/jpg"},
     *     mimeTypesMessage = "msi.core.parameter.imagelogin2.type"
     * )
     * @Vich\UploadableField(mapping="parameters_image", fileNameProperty="imageLogin2Name")
     * 
     * @var File
     */
    private $imageLogin2File;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageLogin2Name;

    /**
     * @Assert\Image(
     *     maxSize="1M",
     *     maxSizeMessage = "msi.core.parameter.imagelogin3.size",
     *     maxWidth = 1080,
     *     maxHeight = 1200,
     *     maxWidthMessage = "msi.core.parameter.imagelogin3.width.max",
     *     maxHeightMessage = "msi.core.parameter.imagelogin3.height.max",
     *     minWidth = 540,
     *     minHeight = 600,
     *     minWidthMessage = "msi.core.parameter.imagelogin3.width.min",
     *     minHeightMessage = "msi.core.parameter.imagelogin3.height.min",
     *     mimeTypes = {"image/jpeg", "image/png","image/jpg"},
     *     mimeTypesMessage = "msi.core.parameter.imagelogin3.type"
     * )
     * @Vich\UploadableField(mapping="parameters_image", fileNameProperty="imageLogin3Name")
     * 
     * @var File
     */
    private $imageLogin3File;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageLogin3Name;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Parameter
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
     * Set logoName
     *
     * @param string $logoName
     * @return Parameter
     */
    public function setLogoName($logoName) {
        $this->logoName = $logoName;

        return $this;
    }

    /**
     * Get logoName
     *
     * @return string 
     */
    public function getLogoName() {
        return $this->logoName;
    }

    /**
     * Set imageLogin1Name
     *
     * @param string $imageLogin1Name
     * @return Parameter
     */
    public function setImageLogin1Name($imageLogin1Name) {
        $this->imageLogin1Name = $imageLogin1Name;

        return $this;
    }

    /**
     * Get imageLogin1Name
     *
     * @return string 
     */
    public function getImageLogin1Name() {
        return $this->imageLogin1Name;
    }

    /**
     * Set imageLogin2Name
     *
     * @param string $imageLogin2Name
     * @return Parameter
     */
    public function setImageLogin2Name($imageLogin2Name) {
        $this->imageLogin2Name = $imageLogin2Name;

        return $this;
    }

    /**
     * Get imageLogin2Name
     *
     * @return string 
     */
    public function getImageLogin2Name() {
        return $this->imageLogin2Name;
    }

    /**
     * Set imageLogin3Name
     *
     * @param string $imageLogin3Name
     * @return Parameter
     */
    public function setImageLogin3Name($imageLogin3Name) {
        $this->imageLogin3Name = $imageLogin3Name;

        return $this;
    }

    /**
     * Get imageLogin3Name
     *
     * @return string 
     */
    public function getImageLogin3Name() {
        return $this->imageLogin3Name;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setLogoFile(File $image = null) {
        $this->logoFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getLogoFile() {
        return $this->logoFile;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageLogin1File(File $image = null) {
        $this->imageLogin1File = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageLogin1File() {
        return $this->imageLogin1File;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageLogin2File(File $image = null) {
        $this->imageLogin2File = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageLogin2File() {
        return $this->imageLogin2File;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageLogin3File(File $image = null) {
        $this->imageLogin3File = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageLogin3File() {
        return $this->imageLogin3File;
    }

}
