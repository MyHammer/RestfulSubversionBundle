<?php

namespace MyHammer\RestfulSubversionBundle\Transformer;

interface ChangesetTransformerInterface
{
    /**
     * @param \RestfulSubversion\Core\Changeset $changeset
     * @return \MyHammer\RestfulSubversionBundle\Entity\Changeset The transformed Changeset
     */
    public function transform(RestfulSubversion\Core\Changeset $changeset);
}
