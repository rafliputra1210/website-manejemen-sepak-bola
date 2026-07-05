<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('urutan')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if (Banner::count() >= 5) {
            return back()->with('error', 'Maksimal hanya 5 banner yang diperbolehkan.');
        }

        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'image_path' => $imagePath,
            'is_active' => true,
            'urutan' => Banner::max('urutan') + 1
        ]);

        return back()->with('success', 'Banner berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if (Storage::disk('public')->exists($banner->image_path)) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();

        return back()->with('success', 'Banner berhasil dihapus.');
    }

    public function toggleActive($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->is_active = !$banner->is_active;
        $banner->save();

        return back()->with('success', 'Status banner diperbarui.');
    }
}
