<?php

namespace App\Http\Controllers;

use App\Http\Helpers\SlimHelper;
use App\Mail\ReviewReceived;
use App\Models\Resource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function upload_dropzone_file(Request $request){

        $image = new Resource;
        $filePath = time() . '.' . $request->file->getClientOriginalExtension();
        $folderPath = 'upload_image';
        Storage::disk('public')->putFileAs($folderPath, $request->file , $filePath);
        $image->filepath = "$folderPath/".$filePath;

        if($request->resourceable_id){
            $image->fill($request->only(['resourceable_id','resourceable_type']));
            $image->save();
        } else{
            $request->session()->push('filepath',$image->filepath);
            $request->session()->push('resourceable_type',$request->resourceable_type);
        }

        return response()->json($image->filepath);
    }

    public function load_uploaded_files($resourceable_id=null,$resourceable_type=null)
    {
        $session_files= session()->get('filepath');
        $resourceable_type = ($resourceable_type == 'blog') ? 'App\Models\Blog' : 'App\Models\Product';
        $resourceable_type = ($resourceable_type == 'product') ? 'App\Models\Product' : 'App\Models\Brand';

        if(!$session_files){
            $resources = Resource::query()->where('resourceable_id', $resourceable_id)
                ->where('resourceable_type', $resourceable_type)
                ->get();
        }
        return view('admin.resources.partials.images', compact('resources','session_files'));
    }

    public function save_alt(Request $request, $id)
    {

        if(!$request->session_id) {
            $resource = Resource::find($id);
            $resource->altval = $request->altval;
            $resource->save();
        } else{
            $request->session()->put('altval.'.$id,$request->altval);

        }

        return response()->json(true);
    }

    public function slim_upload_image(Request $request)
    {
        $images = SlimHelper::getImages('slim');

        if (isset($images) && is_array($images)) {
            $image = array_shift($images);
            if (isset($image['output']['data'])) {
                $fileName = $image['output']['name'];
                $filePath = 'upload_image/'.time() . "_" . $fileName;
                Storage::disk('public')->put($filePath, $image['output']['data']);
                $imageurl = Storage::disk('public')->url($filePath);

                if($meta = @$image['meta']){
                    if($resource_id = $meta->{'resource-id'}){
                        $resource = Resource::find($resource_id);
                        $resource->filepath = $filePath;
                        $resource->save();
                    }
                    if(@$meta->{'session-id'} && @$meta->{'session-id'} >=0 ){
                        $request->session()->put('crop_path.'.@$meta->{'session-id'},$filePath);
                    }
                }
            }
        }

        return response()->json([
            "status" => "success",
            "name"  => $fileName,
            "path" => $filePath,
            "imageurl" => @$imageurl,
        ]);
    }

    public function store_reviews(Request $request)
    {
        Review::create($request->all());

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ReviewReceived($request));

        return redirect()->back()->with('message', 'Review sent for approval!');
    }

    public function delete_image(Request $request,$id)
    {
        $filepath = session()->get('filepath');
        unset($filepath[$id]);
        session()->put('filepath',$filepath);
    }
}
