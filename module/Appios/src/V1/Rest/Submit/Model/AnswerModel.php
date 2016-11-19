<?php
namespace Appios\V1\Rest\Submit\Model;

use Appios\V1\Rest\Submit\Entity\Answer;
use Appios\V1\Rest\Submit\Entity\AnswerRevision;
use Appios\V1\Rest\Submit\Entity\Patient;

class AnswerModel
{
    private $EntityManager;
    
    public function __construct($EntityManager)
    {
        $this->EntityManager = $EntityManager;
    }
    
    public function save(Answer $Answer)
    {
        if(!$Answer->getId()) {
            $Answer->setCreatedAt(new \DateTime("now"));
        }else {
            $Answer->setUpdatedAt(new \DateTime("now"));
        }
        $this->EntityManager->persist($Answer);
        $this->EntityManager->flush($Answer);
        // save revision
        $this->saveRevision($Answer);
    }

    public function saveRevision(Answer $Answer)
    {
        $AnswerRevision = new AnswerRevision();
        $AnswerRevision->setPatient($Answer->getPatient());
        $AnswerRevision->setQuestion($Answer->getQuestion());
        $AnswerRevision->setQuestionOptionId($Answer->getQuestionOptionId());
        $AnswerRevision->setAnswer($Answer->getAnswer());
        $Answer->setCreatedAt(new \DateTime("now"));
        $this->EntityManager->persist($AnswerRevision);
        $this->EntityManager->flush($AnswerRevision);
    }

    public function getAnswer($id)
    {
        $Answer = $this->EntityManager->getRepository('Appios\V1\Rest\Submit\Entity\Answer')->find($id);
        return $Answer;
    }

    public function getQuestionBySlug($slug)
    {
        $Question = $this->EntityManager->getRepository('Appios\V1\Rest\Submit\Entity\Question')->findOneBySlug($slug);
        return $Question;
    }

    public function findAnswerByPatientQuestion($Patient, $Question) {
        $Answer = $this->EntityManager->getRepository('Appios\V1\Rest\Submit\Entity\Answer')->findOneBy(array('patient' => $Patient, 'question' => $Question));
        return $Answer;
    }

    public function resetAnswers(Patient $Patient)
    {
        $Answers = $this->EntityManager->getRepository('Appios\V1\Rest\Submit\Entity\Answer')->findBy(array('patient' => $Patient));
        foreach($Answers as $Answer) {
            $this->EntityManager->remove($Answer);
        }
        if(count($Answers) > 0) {
            $this->EntityManager->flush();
        }
        return true;
    }
    
}
