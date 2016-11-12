<?php

namespace Appios\V1\Rest\Submit\Model;

class PatientModel
{
    private $EntityManager;

    public function __construct($EntityManager)
    {
        $this->EntityManager = $EntityManager;
    }

    public function save($Patient)
    {
        if(!$Patient->getId()) {
            $Patient->setCreatedAt(new \DateTime("now"));
        }else {
            $Patient->setUpdatedAt(new \DateTime("now"));
        }
        $this->EntityManager->persist($Patient);
        $this->EntityManager->flush($Patient);
    }

    public function getPatient($id)
    {
        $Patient = $this->EntityManager->getRepository('Appios\V1\Rest\Submit\Entity\Patient')->find($id);
        return $Patient;
    }

    public function getPatientByDeviceId($deviceId)
    {
        $Patient = $this->EntityManager->getRepository('Appios\V1\Rest\Submit\Entity\Patient')->findOneByDeviceId($deviceId);
        return $Patient;
    }

}