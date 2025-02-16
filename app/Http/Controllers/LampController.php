<?php

namespace App\Http\Controllers;

use App\Models\Lamp;

class LampController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        //get daat lamps
        $lamps = Lamp::latest()->get();

        //return view
        return view('lamps.index',compact('lamps'));
    }
    public function updateLamp($id)
    {
        //find lamp
        $lamp = Lamp::findOrFail($id);

        //update lamp
        if ($lamp->status == 1) {

            ////update lamp
            $lamp->update([
                'status'=> 0
            ]);

            //insert history
            $lamp->histories()->create([
                'status'=> 'OFF'
            ]);

            //return response
            return response()->json([
                'success'=>true,
                'message'=>$lamp->name . ' Berhasil Dimatikan!',
                'data'   =>$lamp
            ]);
        }else if ($lamp->status == 0) {

            //update lamp
            $lamp->update([
                'status'=> 1
            ]);

            //insert histroy
            $lamp->histories()->create([
                'status'=> 'ON'
            ]);

            //return response
            return response()->json([
                'success'=>true,
                'message'=>$lamp->name . ' Berhasil Dihidupkan',
                'data'   =>$lamp
            ]);
        }
    }
}
