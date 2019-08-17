<?php

namespace BrandStudio\Recaptcha\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use BrandStudio\Recaptcha\Exceptions\InvalidRecaptchaException;

class RecaptchaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (config('brandstudio.recaptcha.enabled')) {
            $this->checkRecaptcha($request->get('g-recaptcha-response') ?? '');
        }
        return $next($request);
    }

    private function checkRecaptcha(string $token)
    {
        $response = (new Client)->post(config('brandstudio.recaptcha.verification_url'), [
            'form_params' => [
                'secret'   => config('brandstudio.recaptcha.private_key'),
                'response' => $token
            ],
        ]);

        $response = json_decode((string)$response->getBody(), true);

        if (!$response['success']) {
            throw new InvalidRecaptchaException($response['error-codes'] ?? ['you-are-a-robot']);
        }
    }

}
