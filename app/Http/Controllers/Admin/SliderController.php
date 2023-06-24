<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1':'0';

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status']
        ]);

        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image']= 'uploads/slider/'.$filename;
        }

        if(isset($validatedData['image'])){
            Slider::where('id',$slider->id)->update([
                'title'=>$validatedData['title'],
                'description'=>$validatedData['description'],
                'status'=>$request->status == true ? '1':'0',
                'image'=>$validatedData['image'],
            ]);
        } else {
            Slider::where('id',$slider->id)->update([
                'title'=>$validatedData['title'],
                'description'=>$validatedData['description'],
                'status'=>$request->status == true ? '1':'0',
            ]);
        }
        return redirect('admin/sliders')->with('message','The Slider Updated Sucessfully');
    }

    public function destroy(Slider $slider)
    {
        if($slider->count() > 0){
            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message','The Slider Deleted Sucessfully');
        }
        return redirect('admin/sliders')->with('message','Something Went Wrong');
    }
}
