<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Villages;
use Illuminate\Support\Facades\Validator;

class VillagesController extends Controller
{
    public function index(){
        $data = Villages::all();
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:villages',
            'district_code' => 'required|exists:districts,code',
            'name' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'other' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json(['Error: ' => $validator->errors()], 400);
        }
        $dataMasuk = Villages::create($request->only(['code', 'district_code', 'name', 'latitude', 'longitude', 'other']));
        return response()->json($dataMasuk, 201);
    }

    public function show($id){
        $data = Villages::with('district.city.province')->find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:villages,code,'.$id,
            'district_code' => 'required|exists:districts,code',
            'name' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'other' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json(['Error: ' => $validator->errors()], 400);
        }

        $dataAwal = Villages::find($id);
        if(!$dataAwal){
            return response()->json('Error: Data tidak ditemukan', 404);
        }
        $dataAwal->update($request->only(['code', 'district_code', 'name', 'latitude', 'longitude', 'other']));

        return response()->json($dataAwal, 200);
    }

    public function destroy($id){
        $data = Villages::find($id);
        $data->delete();
        return response()->json(null, 204);
    }
}
