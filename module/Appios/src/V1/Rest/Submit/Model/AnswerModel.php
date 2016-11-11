<?php
namespace Appios\V1\Rest\Submit\Model;

class AnswerModel
{
    private $EntityManager;
    
    public function __construct($EntityManager)
    {
        $this->EntityManager = $EntityManager;
    }
    
    public function save($Answer)
    {
        if(!$Answer->getId()) {
            $Answer->setCreatedAt(new \DateTime("now"));
        }else {
            $Answer->setUpdatedAt(new \DateTime("now"));
        }
        $this->EntityManager->persist($Answer);
        $this->EntityManager->flush($Answer);        
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
    
}
