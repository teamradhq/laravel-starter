<?php

namespace App\Exceptions;

use Exception;

/**
 * Raise this exception when the application experiences some kind of error that
 * does not fit into existing categories of exceptions. This should be though of
 * as a generic exception to use until we can better categorize the issue.
 */
class ApplicationException extends Exception
{
}
