<?php

namespace MyHammer\RestfulSubversionBundle\Transformer;

use RestfulSubversion\Core\Changeset;

class ChangesetTransformer implements ChangesetTransformerInterface
{
    /**
     * Transforms a \RestfulSubversion\Core\Changeset into a \MyHammer\RestfulSubversionBundle\Entity\Changeset
     * 
     * @param \RestfulSubversion\Core\Changeset $changeset
     * @return \MyHammer\RestfulSubversionBundle\Entity\Changeset The transformed Changeset
     */
    public function transform(Changeset $changeset)
    {
        $transformedChangeset = new Changeset($changeset->getRevision()->getAsString());
        $transformedChangeset->setAuthor($changeset->getAuthor());
        $transformedChangeset->setDateTime($changeset->getDateTime());
        $transformedChangeset->setMessage($changeset->getMessage());
        
        $pathOperations = $changeset->getPathOperations();
        foreach ($pathOperations as $pathOperation) {
            $copyFromPath = NULL;
            if (key_exists('copyfromPath', $pathOperation)) {
                $copyFromPath = $pathOperation['copyfromPath']->getAsString();
            }
            $copyFromRev = NULL;
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
