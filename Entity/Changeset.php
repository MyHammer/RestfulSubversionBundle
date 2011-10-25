<?php

namespace MyHammer\RestfulSubversionBundle\Entity;

class Changeset
{
    protected $revision;
    protected $author;
    protected $dateTime;
    protected $message;
    protected $pathOperations;
    
    public function __construct($revision)
    {
        $this->revision = $revision;
    }
    
    public function getRevision()
    {
        return $this->revision;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    
    public function getDateTime()
    {
        return $this->dateTime;
    }
    
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function getPathOperations()
    {
        return $this->pathOperations;
    }
    
    public function addPathOperation($action, $path, $copyfromPath = null, $copyfromRev = null)
    {
        $pathOperation = array('action' => $action,
                               'path' => $path
                               );
        if ($copyfromPath) {
            $pathOperation['copyfromPath'] = $copyfromPath;
        }
        if ($copyfromRev) {
            $pathOperation['copyfromRev'] = $copyfromRev;
        }
        $this->pathOperations[] = $pathOperation;
    }
}
