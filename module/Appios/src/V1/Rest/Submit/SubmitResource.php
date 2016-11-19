<?php
namespace Appios\V1\Rest\Submit;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Appios\V1\Rest\Submit\Entity\Answer;
use Appios\V1\Rest\Submit\Entity\Patient;

class SubmitResource extends AbstractResourceListener
{
    private $AnswerModel;
    private $PatientModel;
    
    public function __construct($AnswerModel, $PatientModel)
    {
        $this->AnswerModel = $AnswerModel;
        $this->PatientModel = $PatientModel;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        //return new ApiProblem(405, 'The POST method has not been defined');

        // create Patient if device id doesn't exist
        if(isset($data->device_id)) {
            if(!empty($data->device_id)) {
                $Patient = $this->PatientModel->getPatientByDeviceId($data->device_id);
                // create new record if Patient does not exist
                if(!$Patient) {
                    $Patient = new Patient();
                    $Patient->setDeviceId($data->device_id);
                    $this->PatientModel->save($Patient);
                }
            }else {
                return new ApiProblem(405, 'Device ID can\'t be empty');
            }
        }else {
            return new ApiProblem(405, 'Device ID is required');
        }
        // save answers
        foreach($data->answers as $answer) {
            // check if question field exists
            if(isset($answer['question'])) {
                // check if question is not empty
                if(!empty($answer['question'])) {
                    // get Question object
                    $Question = $this->AnswerModel->getQuestionBySlug($answer['question']);
                    if($Question) {
                        // check if answer for the question by the user exists
                        $Answer = $this->AnswerModel->findAnswerByPatientQuestion($Patient, $Question);
                        if(!$Answer) {
                            $Answer = new Answer();
                            $Answer->setPatient($Patient);
                            $Answer->setQuestion($Question);
                        }
                        if(!empty($answer['question_option_id'])) $Answer->setQuestionOptionId($answer['question_option_id']);
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
        //return new ApiProblem(405, 'The DELETE method has not been defined for collections');
        // get Patient
        if(isset($data->device_id)) {
            if(!empty($data->device_id)) {
                $Patient = $this->PatientModel->getPatientByDeviceId($data->device_id);
                // exit if no patient found
                if(!$Patient) {
                    return new ApiProblem(405, 'Device ID not found');
                }
            }else {
                return new ApiProblem(405, 'Device ID can\'t be empty');
            }
        }else {
            return new ApiProblem(405, 'Device ID is required');
        }
        // delete answers
        $this->AnswerModel->resetAnswers($Patient);
        return true;
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
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
