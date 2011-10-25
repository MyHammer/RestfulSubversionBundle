<?php

namespace MyHammer\RestfulSubversionBundle\Transformer;

use MyHammer\RestfulSubversionBundle\Entity\RepoFile;

class RepoFileTransformer implements RepoFileTransformerInterface
{
    /**
     * Transforms a \RestfulSubversion\Core\RepoFile into a \MyHammer\RestfulSubversionBundle\Entity\RepoFile
     * 
     * @param \RestfulSubversion\Core\RepoFile $repoFile
     * @return \MyHammer\RestfulSubversionBundle\Entity\RepoFile The transformed RepoFile
     */
    public function transform(RestfulSubversion\Core\RepoFile $repoFile)
    {
        $transformedRepoFile = new RepoFile();
        $transformedRepoFile->setRevision($repoFile->getRevision()->getAsString());
        $transformedRepoFile->setPath($repoFile->getPath()->getAsString());
        $transformedRepoFile->setContent($repoFile->getContent());
        
        return $transformedRepoFile;
    }
}
