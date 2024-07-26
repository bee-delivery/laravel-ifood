<?php

namespace BeeDelivery\LaravelIfood\Functions;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
class LogisticOrder
{
    protected $accessToken;
    protected $client;
    protected $baseUri;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
        $this->baseUri = config('laraifood.base_uri');
    }

    /**
     * Full information on the order (items, payment, delivery information, etc.).
     *
     * @param string $orderId
     * @return array
     */
    public function getDetails(string $orderId)
    {
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->get("{$this->baseUri}/logistics/v1.0/orders/{$orderId}");
        
            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
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
     * Assign a driver to an order.
     *
     * @param string $orderId
     * @param array $data
     * @return array
     */
    public function assignDriver(string $orderId, array $data){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->post("{$this->baseUri}/logistics/v1.0/orders/{$orderId}/assignDriver", $data);

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
            } catch (RequestException $exception) {
                return [
                    'code' => $exception->response ? $exception->response->status() : 500,
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
     * @param string $orderId
     * @return array
     */
    public function goingToOrigin(string $orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->post("{$this->baseUri}/logistics/v1.0/orders/{$orderId}/goingToOrigin");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
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
     * @param string $orderId
     * @return array
     */
    public function arrivedAtOrigin(string $orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->post("{$this->baseUri}/logistics/v1.0/orders/{$orderId}/arrivedAtOrigin");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
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
     * @param string $orderId
     * @return array
     */
    public function dispatch(string $orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->post("{$this->baseUri}/logistics/v1.0/orders/{$orderId}/dispatch");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
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
     * @param string $orderId
     * @return array
     */
    public function arrivedAtDestination(string $orderId){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->post("{$this->baseUri}/logistics/v1.0/orders/{$orderId}/arrivedAtDestination");

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
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
     * @param string $orderId
     * @param array $data
     * @return array
     */
    public function verifyDeliveryCode(string $orderId, array $data){
        try {
            $response = Http::withOptions(['allow_redirects' => false])
                ->withToken($this->accessToken)
                ->post("{$this->baseUri}/logistics/v1.0/orders/{$orderId}/verifyDeliveryCode", $data);

            return [
                'code' => $response->status(),
                'response' => $response->json(),
            ];
        } catch (RequestException $exception) {
            return [
                'code' => $exception->response ? $exception->response->status() : 500,
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
