<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of CompanyPhone
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="companyphone")
 */
class CompanyPhone {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="phoneid", type="integer", nullable=false)
     */
    private $phoneId;

    /**
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phoneNo;

    /**
     * @ORM\Column(name="callfrom", type="time")
     */
    private $callFrom;

    /**
     * @ORM\Column(name="callto", type="time")
     */
    private $callTo;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyContact", inversedBy="phones")
     * @ORM\JoinColumn(name="addrid", referencedColumnName="addrid", nullable=false)
     */
    private $companyAddress;

    /**
     * Get phoneId
     *
     * @return integer 
     */
    public function getPhoneId()
    {
        return $this->phoneId;
    }

    /**
     * Set phoneNo
     *
     * @param string $phoneNo
     * @return CompanyPhone
     */
    public function setPhoneNo($phoneNo)
    {
        $this->phoneNo = $phoneNo;

        return $this;
    }

    /**
     * Get phoneNo
     *
     * @return string 
     */
    public function getPhoneNo()
    {
        return $this->phoneNo;
    }

    /**
     * Set callFrom
     *
     * @param \DateTime $callFrom
     * @return CompanyPhone
     */
    public function setCallFrom($callFrom)
    {
        $this->callFrom = $callFrom;

        return $this;
    }

    /**
     * Get callFrom
     *
     * @return \DateTime 
     */
    public function getCallFrom()
    {
        return $this->callFrom;
    }

    /**
     * Set callTo
     *
     * @param \DateTime $callTo
     * @return CompanyPhone
     */
    public function setCallTo($callTo)
    {
        $this->callTo = $callTo;

        return $this;
    }

    /**
     * Get callTo
     *
     * @return \DateTime 
     */
    public function getCallTo()
    {
        return $this->callTo;
    }


    /**
     * Set companyAddress
     *
     * @param \AppBundle\Entity\CompanyContact $companyAddress
     * @return CompanyPhone
     */
    public function setCompanyAddress(\AppBundle\Entity\CompanyContact $companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return \AppBundle\Entity\CompanyContact 
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }
}
