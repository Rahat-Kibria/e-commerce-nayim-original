<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\seo;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SEOView()
    {
        $seo = seo::first();
        return view('admin.seo.seo', compact('seo'));
    }

    public function SEOUpdate(Request $request, $id)
    {
        $data = seo::find($id);
        $data->meta_author = $request->meta_author;
        $data->meta_title = $request->meta_title;
        $data->meta_tag = $request->meta_tag;
        $data->meta_description = $request->meta_description;
        $data->google_analytics = $request->google_analytics;
        $data->bing_analytics = $request->bing_analytics;
        $data->save();
        $notification = array(
            'message' => 'Successfully SEO Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
