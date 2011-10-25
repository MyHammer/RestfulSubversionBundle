<?php

namespace MyHammer\RestfulSubversionBundle\Entity;

use RestfulSubversion\Core\RepoCacheInterface;
use RestfulSubversion\Core\RepoPath;

class ChangesetRepository
{
    protected $repoCache;

    public function __construct(RepoCacheInterface $repoCache)
    {
        $this->repoCache = $repoCache;
    }
    
    public function findByRevisionAndPaths($revision, $paths)
    {
        $repoPaths = array();
        foreach ($paths as $path) {
            $repoPaths[] = new RestfulSubversion\Core\RepoPath($path);
        }
        
        $files = $this->repoCache
                      ->getRepoFilesForRevisionAndPaths(new RestfulSubversion\Core\Revision($revision), $repoPaths);

        return $diffFiles;
    }
}
