<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrParticipantMax", type="integer", nullable=false)
     */
    private $nbrparticipantmax;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrParticipant", type="integer", nullable=false)
     */
    private $nbrparticipant;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_evenement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;


    /**
     * @return string
     */
    public function getDate()
    {
        return  new \DateTime($this->date);
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {

        $this->date = $date->format('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getNbrParticipantMax()
    {
        return $this->nbrparticipantmax;
    }

    /**
     * @param int $nbrparticipantmax
     */
    public function setNbrParticipantMax($nbrparticipantmax)
    {
        $this->nbrparticipantmax = $nbrparticipantmax;
    }

    /**
     * @return int
     */
    public function getNbrParticipant()
    {
        return $this->nbrparticipant;
    }

    /**
     * @param int $nbrparticipant
     */
    public function setNbrParticipant($nbrparticipant)
    {
        $this->nbrparticipant = $nbrparticipant;
    }

    /**
     * @return int
     */
    public function getIdEvenement()
    {
        return $this->$idEvenement;
    }

    /**
     * @param int $idEvenement
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;
    }

}

