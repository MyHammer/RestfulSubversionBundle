<?php

namespace MyHammer\RestfulSubversionBundle\Transformer;

interface RepoFileTransformerInterface
{
    /**
     * @param \RestfulSubversion\Core\RepoFile $repoFile
     * @return \MyHammer\RestfulSubversionBundle\Entity\RepoFile The transformed RepoFile
     */
    public function transform(RestfulSubversion\Core\RepoFile $repoFile);
}
