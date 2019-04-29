<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CVFormation
 *
 * @ORM\Table(name="c_v_formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CVFormationRepository")
 */
class CVFormation
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
     * @ORM\Column(name="diplome", type="string", length=100)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="particularite", type="string", length=60, nullable=true)
     */
    private $particularite;

    /**
     * @var string
     *
     * @ORM\Column(name="periode", type="string", length=20)
     */
    private $periode;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=60)
     */
    private $ville;


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
     * Set diplome
     *
     * @param string $diplome
     *
     * @return CVFormation
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set particularite
     *
     * @param string $particularite
     *
     * @return CVFormation
     */
    public function setParticularite($particularite)
    {
        $this->particularite = $particularite;

        return $this;
    }

    /**
     * Get particularite
     *
     * @return string
     */
    public function getarticularite()
    {
        return $this->particularite;
    }

    /**
     * Set periode
     *
     * @param string $periode
     *
     * @return CVFormation
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Get periode
     *
     * @return string
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return CVFormation
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Get particularite
     *
     * @return string
     */
    public function getParticularite()
    {
        return $this->particularite;
    }
}
