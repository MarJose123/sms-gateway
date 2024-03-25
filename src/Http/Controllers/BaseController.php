<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use ErrorException;
use Illuminate\Support\Facades\Auth;

class BaseController
{
    protected bool $viewAll;

    protected int $limit = 100;

    protected int $offset = 0;

    /**
     * @throws ErrorException
     */
    public function __construct()
    {
        if (method_exists(\Auth::user(), 'devices')) {
            throw new ErrorException('User Model must implement the HasDevice Traits and SmsPorter Interface');
        }

        $this->viewAll = Auth::user()->canSeeAll();
    }
}
