<?php
namespace Appios\V1\Rest\Submit;

use Appios\V1\Rest\Submit\SubmitResource;

class SubmitResourceFactory
{
    public function __invoke($services)
    {
        $AnswerModel = $services->get(\Appios\V1\Rest\Submit\Model\AnswerModel::class);
        $PatientModel = $services->get(\Appios\V1\Rest\Submit\Model\PatientModel::class);
        return new SubmitResource($AnswerModel, $PatientModel);
    }
}
