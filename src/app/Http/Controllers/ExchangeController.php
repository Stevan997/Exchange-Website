<?php

namespace App\Http\Controllers;

use App\Services\ExchangeApiService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExchangeController extends Controller
{
    private $service;

    /**
     * @param ExchangeApiService $service
     */
    public function __construct(ExchangeApiService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function exchangeStore(Request $request): View
    {
        return view('exchange', ['currencies' => $this->currencies($request)]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function currencies(Request $request): array
    {
        $res = $this->service->getCurrencies($request);
        return $res['data'];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function exchange(Request $request): array
    {
        return $this->service->exchange($request);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function exchangeComplete(Request $request): View
    {
        $res = $this->exchange($request);
        return view('completed', ['data' => $res]);
    }
}
