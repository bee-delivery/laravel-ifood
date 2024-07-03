<?php

namespace BeeDelivery\LaravelIfood\Functions;

use Illuminate\Support\Facades\Http;

class Merchant
{
    protected $base_uri;
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
        $this->base_uri = config('laraifood.base_uri');
    }

    public function getAllMerchants()
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ])
                ->get("{$this->base_uri}/merchant/v1.0/merchants");
        
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

    public function getMerchant($merchantId)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ])
                ->get("{$this->base_uri}/merchant/v1.0/merchants/{$merchantId}");
        
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
