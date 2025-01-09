<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Models\Tracking;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function getTracking($id){

        $trackings = Tracking::where('share_id', $id)->get(); 
        $share = Share::find($id);

        return view('tracking', compact('trackings', 'share'));
    }

    public function store(Request $request, $share_id) {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $photoUrl = null;
        if ($request->hasFile('photo')) {
            $upload = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
            $photoUrl = $upload;
        }
    
        $obj = Tracking::create([
            'share_id' => $share_id,
            'status' => $validated['status'],
            'description' => $validated['description'],
            'photo_url' => $photoUrl,
        ]);

        if($obj->status === "Process is completed"){
            $share = Share::find($obj->share_id);
            $share->status = 'completed';
            $share->save();
        }
    
        return redirect()->back()->with('success', 'Tracking updated successfully!');
    }
}
