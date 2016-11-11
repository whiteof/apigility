<?php
namespace Appios\V1\Rest\Submit;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Appios\V1\Rest\Submit\Entity\Answer;

class SubmitResource extends AbstractResourceListener
{
    private $AnswerModel;
    
    public function __construct($AnswerModel)
    {
        $this->AnswerModel = $AnswerModel;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    // oauth - jjdgheWSfd45
    public function create($data)
    {
        //return new ApiProblem(405, 'The POST method has not been defined');
        
        // save answers
        foreach($data->answers as $answer) {
            // check if question field exists
            if(isset($answer['question'])) {
                // check if question is not empty
                if(!empty($answer['question'])) {
                    // get Question object
                    $Question = $this->AnswerModel->getQuestionBySlug($answer['question']);
                    if($Question) {
                        $Answer = new Answer();
                        $Answer->setQuestion($Question);
                        if(!empty($answer['question_option_id'])) $Answer->setAnswer($answer['question_option_id']);
                        if(!empty($answer['answer'])) $Answer->setAnswer($answer['answer']);
                        $this->AnswerModel->save($Answer);
                    }else {
                        return new ApiProblem(405, 'Question entity does not exist');
                    }
                }else {
                    return new ApiProblem(405, 'Question field is empty');
                }
            }else {
                return new ApiProblem(405, 'Question field does not exist');
            }
        }
        return true;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        //return new ApiProblem(405, 'The GET method has not been defined for individual resources');
        
        $Submit = new SubmitEntity();
        $Submit->id = $id;
        return $Submit;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
