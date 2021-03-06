<?php

namespace AmoCRM\Models;

use AmoCRM\Models\Traits\CallTrait;
use AmoCRM\Models\Traits\RequestIdTrait;

/**
 * Class CallModel
 *
 * @package AmoCRM\Models
 */
class CallModel extends BaseApiModel
{
    use CallTrait;
    use RequestIdTrait;

    /**
     * @var string|null
     */
    protected $direction;

    /**
     * @var int|null
     */
    protected $entityId;

    /**
     * @var string|null
     */
    protected $entityType;

    /**
     * @var BaseApiModel|null
     */
    protected $entity;

    /**
     * @param array $call
     *
     * @return self
     */
    public function fromArray(array $call): CallModel
    {
        $model = new static();

        if (isset($call['uniq'])) {
            $this->setUniq($call['uniq']);
        }

        if (isset($call['duration'])) {
            $this->setDuration($call['duration']);
        }

        if (isset($call['source'])) {
            $this->setSource($call['source']);
        }

        if (isset($call['link'])) {
            $this->setLink($call['link']);
        }

        if (isset($call['phone'])) {
            $this->setPhone($call['phone']);
        }

        if (isset($call['call_result'])) {
            $this->setCallResult($call['call_result']);
        }

        if (isset($call['call_status'])) {
            $this->setCallStatus($call['call_status']);
        }

        if (isset($call['direction'])) {
            $this->setCallStatus($call['direction']);
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'uniq' => $this->getUniq(),
            'duration' => $this->getDuration(),
            'source' => $this->getSource(),
            'link' => $this->getLink(),
            'phone' => $this->getPhone(),
            'call_result' => $this->getCallResult(),
            'call_status' => $this->getCallStatus(),
            'direction' => $this->getDirection(),
            'entity_id' => $this->getEntityId(),
            'entity_type' => $this->getEntityType(),
            'entity' => $this->getEntity() ? $this->getEntity()->toArray() : null,
        ];
    }

    /**
     * @param string|null $requestId
     * @return array
     */
    public function toApi(?string $requestId = "0"): array
    {
        return [
            'uniq' => $this->getUniq(),
            'duration' => $this->getDuration(),
            'source' => $this->getSource(),
            'link' => $this->getLink(),
            'phone' => $this->getPhone(),
            'call_result' => $this->getCallResult(),
            'call_status' => $this->getCallStatus(),
            'direction' => $this->getDirection(),
            'request_id' => $this->getRequestId(),
        ];
    }

    /**
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * @param string|null $direction
     *
     * @return CallModel
     */
    public function setDirection(?string $direction): CallModel
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEntityId(): ?int
    {
        return $this->entityId;
    }

    /**
     * @param int|null $entityId
     *
     * @return CallModel
     */
    public function setEntityId(?int $entityId): CallModel
    {
        $this->entityId = $entityId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntityType(): ?string
    {
        return $this->entityType;
    }

    /**
     * @param string|null $entityType
     *
     * @return CallModel
     */
    public function setEntityType(?string $entityType): CallModel
    {
        $this->entityType = $entityType;

        return $this;
    }

    /**
     * @return BaseApiModel|null
     */
    public function getEntity(): ?BaseApiModel
    {
        return $this->entity;
    }

    /**
     * @param BaseApiModel|null $entity
     *
     * @return CallModel
     */
    public function setEntity(?BaseApiModel $entity): CallModel
    {
        $this->entity = $entity;

        return $this;
    }
}
