<?php

namespace MenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var string
     *
     * @ORM\Column(name="entree", type="string", length=255, nullable=false)
     */
    private $entree;

    /**
     * @var string
     *
     * @ORM\Column(name="plat", type="string", length=255, nullable=false)
     */
    private $plat;

    /**
     * @var string
     *
     * @ORM\Column(name="dessert", type="string", length=255, nullable=false)
     */
    private $dessert;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_menu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMenu;


    /**
     * @return string
     */
    public function getEntree()
    {
        return $this->entree;
    }

    /**
     * @param string $entree
     */
    public function setEntree($entree)
    {
        $this->entree = $entree;
    }

    /**
     * @return string
     */
    public function getPlat()
    {
        return $this->plat;
    }

    /**
     * @param string $plat
     */
    public function setPlat($plat)
    {
        $this->plat = $plat;
    }

    /**
     * @return string
     */
    public function getDessert()
    {
        return $this->dessert;
    }

    /**
     * @param string $dessert
     */
    public function setDessert($dessert)
    {
        $this->dessert = $dessert;
    }

    /**
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param \AppBundle\Entity\User $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getIdMenu()
    {
        return $this->idMenu;
    }

    /**
     * @param int $idMenu
     */
    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;
    }


}

