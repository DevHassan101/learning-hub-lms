<?php

namespace App\Http\Controllers;

use App\Models\DynamicContent;
use App\Models\DynamicContentFields;
use Illuminate\Http\Request;

class DynamicContentController extends Controller
{
    public function index()
    {
        $dynamicContents = DynamicContent::get();
        return view('admin.cms.index', compact('dynamicContents'));
    }
    public function fields($pageName)
    {
        $dynamicContentId = DynamicContent::where('page', $pageName)->firstOrFail()?->id;
        $dynamicContentFields = DynamicContentFields::where('dynamic_content_id', $dynamicContentId)->get();
        return view('admin.cms.fields', compact('dynamicContentFields', 'pageName', 'dynamicContentId'));
    }
    public function updateContent($id, Request $request)
    {
        // return $request->all();
        $data = $request->except(['_token', '_method']);
        foreach ($data as $title => $content) {
            if ($title == 'Image') {
                $image = $request->file('Image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move('public/home-banner', $name_gen);
                $content = 'home-banner/' . $name_gen;
                if($image){
                    
                    DynamicContentFields::where('dynamic_content_id', $id)
                        ->where('title', str_replace('_', ' ', $title))
                        ->update([
                            'content' => $content
                        ]);
                }
            }else{
                if(!$content){
                    return redirect()->back()->withErrors([
                        $title => 'This field is required'
                    ]);
                }
            DynamicContentFields::where('dynamic_content_id', $id)
                ->where('title', str_replace('_', ' ', $title))
                ->update([
                    'content' => $content
                ]);
            }
        }
        return redirect()->back()->with('success', 'Content updated successfully');
    }
}
