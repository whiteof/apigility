<?php
namespace Appios\V1\Rest\Submit;

class SubmitResourceFactory
{
    public function __invoke($services)
    {
        return new SubmitResource();
    }
}
