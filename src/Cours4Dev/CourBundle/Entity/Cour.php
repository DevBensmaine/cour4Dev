<?php

namespace Cours4Dev\CourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cour
 *
 * @ORM\Table(name="cour")
 * @ORM\Entity(repositoryClass="Cours4Dev\CourBundle\Repository\CourRepository")
 */
class Cour
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="dure", type="string", length=255)
     */
    private $dure;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


     /**
     * @ORM\ManyToOne(targetEntity="Cours4Dev\FormationBundle\Entity\Formation")
     */
    private $formation;

    /**
     * @ORM\ManyToOne(targetEntity="Cours4Dev\ChapitreBundle\Entity\Chapitre")
     */
    private $chapitre;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Cour
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dure
     *
     * @param string $dure
     *
     * @return Cour
     */
    public function setDure($dure)
    {
        $this->dure = $dure;

        return $this;
    }

    /**
     * Get dure
     *
     * @return string
     */
    public function getDure()
    {
        return $this->dure;
    }



    /**
     * Set Description
     *
     * @param string $description
     *
     * @return Description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get dure
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set Formation
     *
     * @return Formation
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get Formation
     *
     * @return string
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set chapitre
     *
     * @return chapitre
     */
    public function setChapitre($chapitre)
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    /**
     * Get chapitre
     *
     * @return string
     */
    public function getChapitre()
    {
        return $this->chapitre;
    }
}

