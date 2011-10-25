<?php

namespace MyHammer\RestfulSubversionBundle\Entity;

class RepoFile
{
    protected $revision;
    protected $path;
    protected $content;
    
    public function getRevision()
    {
        return $this->revision;
    }
    
    public function setRevision($revision)
    {
        $this->revision = $revision;
    }
    
    public function getPath()
    {
        return $this->path;
    }
    
    public function setPath($path)
    {
        $this->path = $path;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }
}
