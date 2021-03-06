<?php

namespace Code16\Sharp\Http;

class SharpContext
{
    /**
     * @var string
     */
    protected $page;

    /**
     * @var mixed
     */
    protected $entityId;

    /**
     * @var string
     */
    protected $action;

    public function setIsForm()
    {
        $this->page = "FORM";
    }

    public function setIsUpdate($entityId)
    {
        $this->setIsForm();
        $this->entityId = $entityId;
        $this->action = "UPDATE";
    }

    public function setIsCreation()
    {
        $this->setIsForm();
        $this->action = "CREATION";
    }

    /**
     * @return bool
     */
    public function isForm(): bool
    {
        return $this->page == "FORM";
    }

    /**
     * @return bool
     */
    public function isUpdate(): bool
    {
        return $this->isForm() && $this->action == "UPDATE";
    }

    /**
     * @return bool
     */
    public function isCreation(): bool
    {
        return $this->isForm() && $this->action == "CREATION";
    }

    /**
     * @return mixed|null
     */
    public function entityId()
    {
        return $this->isUpdate()
            ? $this->entityId
            : null;
    }
}