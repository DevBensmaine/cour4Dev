<?php

namespace Cours4Dev\ChapitreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chapitre
 *
 * @ORM\Table(name="chapitre")
 * @ORM\Entity(repositoryClass="Cours4Dev\ChapitreBundle\Repository\ChapitreRepository")
 */
class Chapitre
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
     * @ORM\ManyToOne(targetEntity="Cours4Dev\FormationBundle\Entity\Formation")
     */
    private $formation;

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
     * @return Chapitre
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
}

