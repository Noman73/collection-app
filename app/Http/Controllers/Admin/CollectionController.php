<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collections;
use App\Models\RittikiRelation;
class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()){
            $get=Collections::query();
            return DataTables::of($get)
              ->addIndexColumn()
              ->addColumn('action',function($get){
              $button  ='<div class="d-flex justify-content-center">
              <a data-url="'.route('admin.collection.edit',$get->id).'"  href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp me-1 editRow"><i class="fas fa-pencil-alt"></i></a>
              <a data-url="'.route('admin.collection.destroy',$get->id).'" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp deleteRow"><i class="fa fa-trash"></i></a>
          </div>';
            return $button;
          })
          ->addColumn('icon',function($get){
            $explode=explode('|',$get->icon);
            $icon="<i class='fa ".$explode[0]."'></i> ".$explode[0];
          return $icon;
        })
          ->rawColumns(['action','icon'])->make(true);
        }
        return view('backend.collection.collection');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'donor'=>"required|max:200|min:1",
            'sostoyoni'=>"required|max:200|min:1",
            'istovriti'=>"required|max:200|min:1",
            'dokkhina'=>"required|max:200|min:1",
            'songothoni'=>"required|max:200|min:1",
            'pronami'=>"required|max:200|min:1",
            'advertisement'=>"required|max:200|min:1",
            'mandir_construction'=>"required|max:200|min:1",
            'various'=>"required|max:200|min:1",
            'rittiki'=>"required|max:200|min:1",
            'rittiki_ammount'=>"required|max:200|min:1",
        ]);

        if($validator->passes()){
            $collection=new Donor;
            $collection->donor_id=$request->donor;
            $collection->sostoyoni=$request->sostoyoni;
            $collection->istovriti=$request->istovriti;
            $collection->dokkhina=$request->dokkhina;
            $collection->songothoni=$request->songothoni;
            $collection->pronami=$request->pronami;
            $collection->advertisement=$request->advertisement;
            $collection->mandir_construction=$request->mandir_construction;
            $collection->various=$request->various;
            $collection->author_id=auth()->user()->id;
            $collection->save();
            $ammount=explode(',',$request->rittiki_ammount);
            $i=0;
            foreach(explode(',',$request->rittiki) as $data){
                $rittiki_relations=new RittikiRelation;
                $rittiki_relations->collection_id=$collection->id;
                $rittiki_relations->ammount=$ammount[$i];
                $rittiki_relations->rittiki_id=$data;
                $i++;
            }
            if ($collection){
                return response()->json(['message'=>'Donor Added Success']);
            }
        }
        return response()->json(['error'=>$validator->getMessageBag()]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
