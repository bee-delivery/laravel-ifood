<?php

namespace BeeDelivery\LaravelIfood\Functions;

use Illuminate\Support\Facades\Http;

class LogisticOrder
{
    protected $accessToken;
    protected $client;
    protected $base_uri;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
        $this->base_uri = config('laraifood.base_uri');
    }

    /**
     * Full information on the order (items, payment, delivery information, etc.).
     *
     * @param uuid $orderId
     * @return array
     */
    public function getDetails($orderId)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ])
                ->get("{$this->base_uri}/logistics/v1.0/orders/{$orderId}");
        
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

    /**
     * Assign a driver to an order.
     *
     * @param uuid $orderId
     * @param array $data
     * @return array
     */
    public function assignDriver($orderId, $data){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([''=> 'Bearer ' . $this->accessToken])
                ->post("{$this->base_uri}/logistics/v1.0/orders/{$orderId}/assignDriver", $data);

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
            } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'code' => 500,
                'response' => $e->getMessage(),
            ];
        }
    }

    /**
     * Driver is going to the origin of the order.
     *
     * @param uuid $orderId
     * @return array
     */
    public function goingToOrigin($orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([''=> 'Bearer ' . $this->accessToken])
                ->post("{$this->base_uri}/logistics/v1.0/orders/{$orderId}/goingToOrigin");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'code' => 500,
                'response' => $e->getMessage(),
            ];
        }
    }

    //arrivedAtOrigin
    /**
     * Driver arrived at the origin of the order.
     *
     * @param uuid $orderId
     * @return array
     */
    public function arrivedAtOrigin($orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([''=> 'Bearer ' . $this->accessToken])
                ->post("{$this->base_uri}/logistics/v1.0/orders/{$orderId}/arrivedAtOrigin");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'code' => 500,
                'response' => $e->getMessage(),
            ];
        }
    }

    //dispatch
    /**
     * Dispatch the order.
     * @param mixed $orderId
     * @return array
     */
    public function dispatch($orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([''=> 'Bearer ' . $this->accessToken])
                ->post("{$this->base_uri}/logistics/v1.0/orders/{$orderId}/dispatch");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'code' => 500,
                'response' => $e->getMessage(),
            ];
        }
    }

    /**
     * Driver arrived at the destination of the order.
     *
     * @param uuid $orderId
     * @return array
     */
    public function arrivedAtDestination($orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([''=> 'Bearer ' . $this->accessToken])
                ->post("{$this->base_uri}/logistics/v1.0/orders/{$orderId}/arrivedAtDestination");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'code' => 500,
                'response' => $e->getMessage(),
            ];
        }
    }

    /**
     * Verify the delivery code of the order.
     *
     * @param uuid $orderId
     * @param array $data
     * @return array
     */
    public function verifyDeliveryCode($orderId, $data){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([''=> 'Bearer ' . $this->accessToken])
                ->post("{$this->base_uri}/logistics/v1.0/orders/{$orderId}/verifyDeliveryCode", $data);

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'code' => $e->response ? $e->response->status() : 500,
                'response' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'code' => 500,
                'response' => $e->getMessage(),
            ];
        }
    }

}
