<?php

namespace App\Http\Controllers\Membre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Fichier;

class LivresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $fichier = Fichier::where('user_id', $id)->paginate(10);
        return view('membre.livres.index', compact('fichier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membre.livres.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            $input['image'] = $this->uploadImage($input['image']);
            $input['file'] = $this->uploadImage($input['file']);
            $input['user_id'] = Auth::user()->id;
            $input['status'] = 0;
            //dd($input);
            $fichier = Fichier::create($input);
            if ($fichier) {
                return redirect('Gestionbook')->with('success', 'Book created Successfully!');;
            }
        }
    }

    public function uploadImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = $sha1 . "." . $extension;
        $path = public_path('book/' . date('Y-m-d') . '/');
        $file->move($path, $filename);

        return 'book/' . date('Y-m-d') . '/' . $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file= Fichier::findOrFail($id);
        return view('membre.livres.edit' ,compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();
        $image=$input['photo'];
        $files = $input['files'];

        if(isset($input['image']))
        {
            $input['image']=$this->uploadImage($input['image']);
            unlink($image);
        }

        if(isset($input['file']))
        {
            $input['file']=$this->uploadImage($input['file']);
            unlink($files);
        }
        $f = Fichier::findOrFail($id)->update($input);
        if($f)
        {
            return redirect('Gestionbook')->with('info','Book Updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $f = Fichier::findOrFail($id);
        $img=$f['image'];
        $file= $f['file'];
        $f->delete();
        unlink($img);
        unlink($file);
        return redirect()->back()->with('warning','Book deleted successfully!');
    }
}
