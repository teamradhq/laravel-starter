<?php

namespace App\Exceptions;

use Exception;

/**
 * Raise this exception when there are issues within testing environments. For example,
 * this should be raised when a test setup or teardown fails. This makes it easier to
 * distinguish between test failures and test errors.
 */
class TestException extends Exception
{
    //
}
