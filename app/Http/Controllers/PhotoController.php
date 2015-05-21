<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use App\Models\Photo;

class PhotoController extends Controller {

	public function __construct(){
		$this->middleware('auth',['only'=>['getIndex']]);
	}
	
	public function getIndex(){
		$photos = Photo::orderBy('created_at','DESC')->paginate(10);
		$photos->setPath('/smoke-cctv-backend/public/photo');
		return view('photo.index',compact('photos'));
	}

	public function postCreate(){
		if (Input::hasFile('uploaded_file')){
			$photo = new Photo();
			$photo->save();
			$file = Input::file('uploaded_file');

			$filePath = public_path().'/uploads/photos/';
			$file->move($filePath,$photo->id.'.'.$file->getClientOriginalExtension());
			$photo->url = 'uploads/photos/'.$photo->id.'.'.$file->getClientOriginalExtension();
			$photo->save();
			var_dump($photo);
		} else {
			var_dump(Input::all());
		}
		
	}

	public function getDelete($id){
		Photo::find($id)->delete();
		return redirect()->back();
	}

	public function getRead($id){
		$photo = Photo::find($id);
		return view('photo.read',compact('photo'));
	}

}
