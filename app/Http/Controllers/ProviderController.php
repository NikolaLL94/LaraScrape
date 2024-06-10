<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderStoreRequest;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('provider.index', [
            'providers' => ProviderResource::collection(
                Provider::paginate(15)
            )
        ]);
    }

    /**
     * @param Provider $provider
     * @return Application|Factory|View
     */
    public function show(Provider $provider)
    {
        $provider = new ProviderResource($provider);

        return view('provider.show', compact('provider'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        return view('provider.create', [
            'projects' => Project::get()
        ]);
    }

    /**
     * @param ProviderStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProviderStoreRequest $request)
    {
        Provider::create($request->validated());

        return redirect()->route('provider.index')
            ->with('success', 'Provider has been created successfully.');
    }
}
