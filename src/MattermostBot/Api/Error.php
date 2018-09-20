<?php
/**
 * Created by PhpStorm.
 * User: isoria
 * Date: 11/09/18
 * Time: 13:01
 */

namespace MattermostBot\Api;

use Throwable;

class Error extends \Error{

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}