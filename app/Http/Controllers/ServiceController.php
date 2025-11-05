<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Service::class, 'service', [
            'except' => ['index', 'show'],
        ]);
    }

    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validatedData['image'] = $path;
        }
        
        $validatedData['user_id'] = Auth::id();
        Service::create($validatedData);
        return redirect()->route('services.index')->with('success', 'Service créé !');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|gt:0',
        ]);
        $service->update($validatedData);
        return redirect()->route('services.show', $service)->with('success', 'Service mis à jour.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé.');
    }
}