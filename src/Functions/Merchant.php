<?php

namespace BeeDelivery\LaravelIfood\Functions;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

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
                ->withToken($this->accessToken)
                ->get("{$this->base_uri}/merchant/v1.0/merchants");
        
            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
                'response' => $exception->getMessage(),
            ];
        } catch (\Exception $exception) {
            return [
                'code' => 500,
                'response' => $exception->getMessage(),
            ];
        }
    }

    public function getMerchant($merchantId)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->get("{$this->base_uri}/merchant/v1.0/merchants/{$merchantId}");
        
            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
                'response' => $exception->getMessage(),
            ];
        } catch (\Exception $exception) {
            return [
                'code' => 500,
                'response' => $exception->getMessage(),
            ];
        }
    }
}
