<?php
namespace Appios\V1\Rest\Submit;

class SubmitEntity
{
    private $id;
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
}
