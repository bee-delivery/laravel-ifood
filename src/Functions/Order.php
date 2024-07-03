<?php

namespace BeeDelivery\LaravelIfood\Functions;

use Illuminate\Support\Facades\Http;

class Order
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
     * State changes and other kinds of notifications related to orders on the platform.
     *
     * @param string $groups
     * @param string $types
     * @return array
     */
    public function eventsPolling($groups = null, $types = null)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ])
                ->get("{$this->base_uri}/order/v1.0/events:polling", [
                    'groups' => $groups,
                    'types' => $types,
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

    /**
     * Full information on the order (items, payment, delivery information, etc.).
     *
     * @param uuid $orderId
     * @return array
     */
    public function details($orderId)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ])
                ->get("{$this->base_uri}/order/v1.0/orders/{$orderId}");
        
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
     * Acknowledge a set of events, dismissing them from future polling calls.
     *
     * @param array $events
     * @return array
     */
    public function acknowledge($events)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json',
                ])
                ->post("{$this->base_uri}/order/v1.0/events/acknowledgment", [
                    'body' => json_encode($events),
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

    public function dispatch($orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ])
                ->post("{$this->base_uri}/order/v1.0/orders/{$orderId}/dispatch");
        
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
