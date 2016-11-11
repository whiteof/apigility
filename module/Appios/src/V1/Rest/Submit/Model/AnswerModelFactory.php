<?php
namespace Appios\V1\Rest\Submit\Model;

class AnswerModelFactory
{
    public function __invoke($services)
    {
        $EntityManager = $services->get('doctrine.entitymanager.orm_default');
        return new AnswerModel($EntityManager);
    }
}
