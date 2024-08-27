<?php

namespace  SalatNotifier\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SalatNotifier\Interfaces\SalatTimeInterface;
use SalatNotifier\Interfaces\SalatTimeManagerInterface;
use SalatNotifier\Repositories\SalatTimeManagerRepository;
use SalatNotifier\Requests\SalatTimeRequestForm;

class SalatTimeManagerController extends Controller
{
    protected $salatTimeRepository;
    public function __construct(SalatTimeManagerRepository $salatTimeRepository)
    {
        $this->salatTimeRepository = $salatTimeRepository;
    }
    public function index()
    {
        $types = self::types();
        $salatTimes = $this->salatTimeRepository->all();
        return view('SalatNotifier::salat', compact('salatTimes', 'types'));
    }
    public function store(SalatTimeRequestForm $request)
    {
        $this->salatTimeRepository->store($request->validated());
        return redirect()->route('salat-times.index');
    }
    public function edit($id)
    {
        $data['types'] = self::types();
        $data['salatTimes'] = $this->salatTimeRepository->all();
        $data['editSalatTime'] = $this->salatTimeRepository->findById($id);
        return view('SalatNotifier::salat', $data);
    }
    public function update($id, SalatTimeRequestForm $request)
    {
        $this->salatTimeRepository->update($id, $request->validated());
        return redirect()->route('salat-times.index');
    }
    public function delete($id)
    {
        $this->salatTimeRepository->delete($id);
        return redirect()->route('salat-times.index');
    }
    private static function types()
    {
        return [
            'fajor',
            'jhuhor',
            'asor',
            'maghrib',
            'esha'
        ];
    }
}
