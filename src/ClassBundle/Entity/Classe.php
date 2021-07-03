<?php

namespace ClassBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity
 */
class Classe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nbrMax", type="integer", nullable=false)
     */
    private $nbrmax;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_classe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClasse;

    /**
     * @return int
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * @param int $idClasse
     */
    public function setIdClasse($idClasse)
    {
        $this->idClasse = $idClasse;
    }

    /**
     * @return int
     */
    public function getNbrMax()
    {
        return $this->nbrmax;
    }

    /**
     * @param int $nbrmax
     */
    public function setNbrMax($nbrmax)
    {
        $this->nbrmax = $nbrmax;
    }

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

}

