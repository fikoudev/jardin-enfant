<?php

namespace EnfantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enfant
 *
 * @ORM\Table(name="enfant", indexes={@ORM\Index(name="id_classe", columns={"id_classe"}), @ORM\Index(name="id_parent", columns={"id_parent"})})
 * @ORM\Entity
 */
class Enfant
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantine", type="integer", nullable=false)
     */
    private $cantine;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_enfant", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEnfant;

    /**
     * @var \ClassBundle\Entity\Classe
     *
     * @ORM\ManyToOne(targetEntity="ClassBundle\Entity\Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_classe", referencedColumnName="id_classe")
     * })
     */
    private $idClasse;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_parent", referencedColumnName="Id")
     * })
     */
    private $idParent;


    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenon = $prenom;
    }
    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getCantine()
    {
        return $this->cantine;
    }

    /**
     * @param int $cantine
     */
    public function setCantine($cantine)
    {
        $this->cantine = $cantine;
    }

    /**
     * @return int
     */
    public function getIdEnfant()
    {
        return $this->idEnfant;
    }

    /**
     * @param int $idEnfant
     */
    public function setIdEnfant($idEnfant)
    {
        $this->idEnfant = $idEnfant;
    }

    /**
     * @return \AppBundle\Entity\User
     */
    public function getIdParent()
    {
        return $this->idParent;
    }

    /**
     * @param \AppBundle\Entity\User $idParent
     */
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;
    }

    /**
     * @return \ClassBundle\Entity\Classe
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * @param \ClassBundle\Entity\Classe $idClasse
     */
    public function setIdClasse($idClasse)
    {
        $this->idClasse = $idClasse;
    }




}

