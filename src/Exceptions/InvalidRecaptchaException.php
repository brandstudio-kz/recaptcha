<?php

namespace BrandStudio\Recaptcha\Exceptions;

use Exception;

class InvalidRecaptchaException extends Exception
{

    protected $error_codes;

    public function __construct(array $error_codes)
    {
        $this->error_codes = $error_codes;
    }

    public function render($request)
    {
        return abort(403, $this->getErrorMessage());
    }

    private function getErrorMessage() : string
    {
        $messages = [trans('brandstudio::recaptcha.access-denied')];
        foreach($this->error_codes as $error_code) {
            $messages[] = trans("brandstudio::recaptcha.{$error_code}");
        }
        return implode(' ', $messages);
    }

}
