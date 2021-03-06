<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\Query\Query;
use Doctrine\ODM\MongoDB\UnitOfWork;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadataInfo;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class ApplicationDocumentUserHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id']) || (! empty($this->class->fieldMappings['id']['nullable']) && array_key_exists('_id', $data))) {
            $value = $data['_id'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['id']['type'];
                $return = $value instanceof \MongoId ? (string) $value : $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['name']) || (! empty($this->class->fieldMappings['name']['nullable']) && array_key_exists('name', $data))) {
            $value = $data['name'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['name']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['name']->setValue($document, $return);
            $hydratedData['name'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['email']) || (! empty($this->class->fieldMappings['email']['nullable']) && array_key_exists('email', $data))) {
            $value = $data['email'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['email']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['email']->setValue($document, $return);
            $hydratedData['email'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['password']) || (! empty($this->class->fieldMappings['password']['nullable']) && array_key_exists('password', $data))) {
            $value = $data['password'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['password']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['password']->setValue($document, $return);
            $hydratedData['password'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['roles']) || (! empty($this->class->fieldMappings['roles']['nullable']) && array_key_exists('roles', $data))) {
            $value = $data['roles'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['roles']['type'];
                $return = $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['roles']->setValue($document, $return);
            $hydratedData['roles'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['registered'])) {
            $value = $data['registered'];
            if ($value === null) { $return = null; } else { $return = \Doctrine\ODM\MongoDB\Types\DateType::getDateTime($value); }
            $this->class->reflFields['registered']->setValue($document, clone $return);
            $hydratedData['registered'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['updated'])) {
            $value = $data['updated'];
            if ($value === null) { $return = null; } else { $return = \Doctrine\ODM\MongoDB\Types\DateType::getDateTime($value); }
            $this->class->reflFields['updated']->setValue($document, clone $return);
            $hydratedData['updated'] = $return;
        }
        return $hydratedData;
    }
}