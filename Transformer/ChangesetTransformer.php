<?php

namespace MyHammer\RestfulSubversionBundle\Transformer;

use MyHammer\RestfulSubversionBundle\Entity\Changeset;

class ChangesetTransformer implements ChangesetTransformerInterface
{
    /**
     * Transforms a \RestfulSubversion\Core\Changeset into a \MyHammer\RestfulSubversionBundle\Entity\Changeset
     * 
     * @param \RestfulSubversion\Core\Changeset $changeset
     * @return \MyHammer\RestfulSubversionBundle\Entity\Changeset The transformed Changeset
     */
    public function transform(RestfulSubversion\Core\Changeset $changeset)
    {
        $transformedChangeset = new Changeset();
        $transformedChangeset->setRevision($changeset->getRevision()->getAsString());
        $transformedChangeset->setAuthor($changeset->getAuthor());
        $transformedChangeset->setDateTime($changeset->getDateTime());
        $transformedChangeset->setMessage($changeset->getMessage());
        
        $pathOperations = $changeset->getPathOperations();
        foreach ($pathOperations as $pathOperation) {
            $copyFromPath = null;
            if (key_exists('copyfromPath', $pathOperation)) {
                $copyFromPath = $pathOperation['copyfromPath']->getAsString();
            }
            $copyFromRev = null;
            if (key_exists('copyfromPath', $pathOperation)) {
                $copyFromRev = $pathOperation['copyfromRev']->getAsString();
            }
            $transformedChangeset->addPathOperation($pathOperation['action'],
                                         $pathOperation['path']->getAsString(),
                                         $copyFromPath,
                                         $copyFromRev
                                        );
        }
        
        return $transformedChangeset;
    }
}
