<?php

namespace MyHammer\RestfulSubversionBundle\Entity;

use MyHammer\RestfulSubversionBundle\Transformer\ChangesetTransformerInterface;
use RestfulSubversion\Core\RepoCacheInterface;

class ChangesetRepository
{
    protected $repoCache;
    protected $transformer;

    public function __construct(RepoCacheInterface $repoCache, ChangesetTransformerInterface $transformer)
    {
        $this->repoCache = $repoCache;
        $this->transformer = $transformer;
    }
    
    public function findAll($startAtRevision = null, $limit = null)
    {
        $cachedChangesets = $this->repoCache->getChangesets('descending', $startAtRevision, $limit);
        $changesets = array();
        foreach ($cachedChangesets as $cachedChangeset) {
            $changesets[] = $this->transformer->transform($cachedChangeset);
        }
        return $changesets;
    }

    public function findByText($text, $order = 'ascending', $limit = null)
    {
        $cachedChangesets = $this->repoCache->getChangesetsWithMessageContainingText($text, $order, $limit);
        $changesets = array();
        foreach ($cachedChangesets as $cachedChangeset) {
            $changesets[] = $this->transformer->transform($cachedChangeset);
        }
        return $changesets;
    }
}
