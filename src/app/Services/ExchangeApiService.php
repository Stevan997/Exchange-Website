<?php

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ExchangeApiService extends ApiService
{
    private $endpoint;
    private $version;

    private static $CURRENCIES = '/currencies';
    private static $EXCHANGE = '/exchange';

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = env('EXCHANGE_API_INTERNAL_ENDPOINT');
        $this->version = env('EXCHANGE_API_VERSION');
    }

    /**
     * @param Request $request
     * @return array|array[]
     */
    public function getCurrencies(Request $request)
    {
        try {
            $res = $this->client->get($this->endpoint . $this->version . self::$CURRENCIES, [
                'query' => $request->all()
            ]);
            return (array)json_decode($res->getBody()->getContents());
        } catch (GuzzleException $exception) {
            return ['data' => [], 'status' => 'fail', 'message' => $exception->getMessage()];
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function exchange(Request $request)
    {
        try {
            $res = $this->client->get($this->endpoint . $this->version . self::$EXCHANGE, [
                'query' => $request->all()
            ]);
            return (array)json_decode($res->getBody()->getContents());
        } catch (GuzzleException $exception) {
            return ['status' => 'fail', 'message' => $exception->getMessage()];
        }
    }
}
