<?php

namespace Mortezamollaie\TasksManagement\ApiResponse;

class ServiceResult
{
    public function __construct(public bool $ok, public mixed $data = null)
    {
    }
}
