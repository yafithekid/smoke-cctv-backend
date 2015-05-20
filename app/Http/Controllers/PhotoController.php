<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use App\Models\Photo;

class PhotoController extends Controller {

	public function getIndex(){
		$photos = Photo::all();
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

}
