<?php

namespace MyHammer\RestfulSubversionBundle\Transformer;

use RestfulSubversion\Core\Changeset;

interface ChangesetTransformerInterface
{
    /**
     * @param \RestfulSubversion\Core\Changeset $changeset
     * @return \MyHammer\RestfulSubversionBundle\Entity\Changeset The transformed Changeset
     */
    public function transform(Changeset $changeset);
}
