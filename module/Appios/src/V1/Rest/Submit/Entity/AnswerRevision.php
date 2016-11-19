<?php
namespace Appios\V1\Rest\Submit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answer_revision")
 */
class AnswerRevision
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Patient", inversedBy="answers", fetch="LAZY")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     */
    private $patient;
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers", fetch="LAZY")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;
    /**
     * @ORM\Column(name="question_option_id", type="integer", nullable=false)
     */
    private $questionOptionId;
    /**
     * @ORM\Column(name="answer", type="string", nullable=true)
     */
    private $answer;
    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Patient $patient
     * @return Answer
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }
    /**
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param Question $question
     * @return Answer
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }
    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param integer $questionOptionId
     * @return Answer
     */
    public function setQuestionOptionId($questionOptionId)
    {
        $this->questionOptionId = $questionOptionId;
        return $this;
    }
    /**
     * @return integer
     */
    public function getQuestionOptionId()
    {
        return $this->questionOptionId;
    }

    /**
     * @param string $answer
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }
    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param datetime $createdAt
     * @return Answer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}
