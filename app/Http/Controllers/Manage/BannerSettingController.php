<?php

namespace App\Http\Controllers\Manage;

use App\Models\BannerSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerSettingController extends Controller
{
    public function index()
    {
        return view('manage.banner.index');
    }    //

    public function update(Request $request, BannerSetting $banner)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'file' => 'image',
        ]);

        if ($request->file('file')) {

            if (!is_null($banner->thumbnail)) {
                Storage::disk('public')->delete($banner->thumbnail);
            }
            $path = $request->file('file')->store('assets/banner', 'public');
            $request['thumbnail'] = $path;
        }

        $banner->update($request->all());
        return redirect()->route('banner.index')->with('success', 'Banner setting has been edited');
    }
}
