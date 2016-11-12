<?php
namespace Appios\V1\Rest\Submit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="question")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $id;
    /**
     * @ORM\Column(name="slug", type="string", nullable=false)
     */        
    private $slug;
    /**
     * @ORM\Column(name="title", type="string", nullable=false)
     */        
    private $title;
    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", fetch="LAZY")
     **/
    protected $answers;
    
    /**
     * @return integer
     */    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $slug
     * @return Question
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }
    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }    
    
    /**
     * @param string $title
     * @return Question
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param array $answers
     * @return Question
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
        return $this;
    }
    /**
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }
    
}
