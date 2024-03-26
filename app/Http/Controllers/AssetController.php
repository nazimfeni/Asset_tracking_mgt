<?php
namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        $assetTypes = AssetType::all();// Retrieve all asset types from the database
        return view('assets.create', compact('assetTypes'));
    }

    public function store(Request $request)
    {
        Asset::create($request->all());
        return redirect()->route('assets.index')->with('success', 'Asset created successfully');
    }

    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    public function edit(Asset $asset)
    { 
        $assetTypes = AssetType::all();
        return view('assets.edit', compact('asset','assetTypes'));
    }

    public function update(Request $request, Asset $asset)
    {
        $asset->update($request->all());
        return redirect()->route('assets.index')->with('success', 'Asset updated successfully');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully');
    }
}
