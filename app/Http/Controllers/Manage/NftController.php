<?php

namespace App\Http\Controllers\Manage;

use App\Models\Nft;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NftController extends Controller
{
    public function index()
    {
        return view('manage.nft.index');
    }

    public function create()
    {
        return view('manage.nft.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image',
            'image' => 'required|image',
        ]);

        if ($request->file('file')) {
            $path = $request->file('file')->store('assets/egg', 'public');
            $request['egg'] = $path;
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('assets/nft', 'public');
            $request['nft'] = $path;
        }

        Nft::create($request->all());

        return redirect()->route('nfts.index')->with('success', 'NFT has been added');
    }

    public function edit(nft $nft)
    {
        return view('manage.nft.edit', compact('nft'));
    }

    public function update(Request $request, Nft $nft)
    {
        $this->validate($request, [
            'file' => 'image',
            'image' => 'image',
        ]);

        if ($request->file('file')) {

            if (!is_null($nft->egg)) {
                Storage::disk('public')->delete($nft->egg);
            }

            $path = $request->file('file')->store('assets/egg', 'public');
            $request['egg'] = $path;
        }

        if ($request->file('image')) {

            if (!is_null($nft->nft)) {
                Storage::disk('public')->delete($nft->nft);
            }

            $path = $request->file('image')->store('assets/nft', 'public');
            $request['nft'] = $path;
        }

        $nft->update($request->all());

        return redirect()->route('nfts.index')->with('success', 'NFT has been edited');
    }


    public function destroy(Nft $nft)
    {
        Storage::disk('public')->delete($nft->egg);
        Storage::disk('public')->delete($nft->nft);
        $nft->delete();
        return redirect()->route('nfts.index')->with('success', 'NFT has been deleted');
    }
}
