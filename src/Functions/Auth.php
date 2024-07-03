<?php

namespace BeeDelivery\LaraiFood\Functions;
use Illuminate\Support\Facades\Http;

class Auth
{
    protected $base_uri;
    protected $client_id;
    protected $client_secret;
    protected $grant_type;
    protected $accessToken;
    protected $refreshToken;
    protected $authorizationCode;
    protected $authorizationCodeVerifier;
    protected $verificationUrl;
    protected $verificationUrlComplete;

    public function __construct()
    {
        $this->base_uri = config('laraifood.base_uri');
        $this->client_id = config('laraifood.client_id');
        $this->client_secret = config('laraifood.client_secret');
        $this->grant_type = config('laraifood.grant_type');
    }

    public function getUserCode()
    {

        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->asForm()
                ->withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ])
                ->post("{$this->base_uri}/authentication/v1.0/oauth/userCode", [
                    'clientId' => $this->client_id,
                ]);
                
            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        }

    }

    public function getToken($data = array())
    {
        $formParams = [
            'grantType' => isset($data['refreshToken']) ? 'refresh_token' : $this->grant_type,
            'clientId' => $this->client_id,
            'clientSecret' => $this->client_secret,
            'authorizationCode' => $data['authorizationCode'] ?? null,
            'authorizationCodeVerifier' => $data['authorizationCodeVerifier'] ?? null,
            'refreshToken' => $data['refreshToken'] ?? null,
        ];

        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->asForm()
                ->withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ])
                ->post("{$this->base_uri}/authentication/v1.0/oauth/token", $formParams);

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        }
    }

}
