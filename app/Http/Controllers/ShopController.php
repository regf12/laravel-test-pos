<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all()
    {
        $shops = Shop::all();

        return response()->json([
            'status' => 'success',
            'data' => $shops
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = Shop::create($request->all());

        $user = Auth::user();
        Log::create([
            "user_id"       => $user->name,
            "accion"        => 'Registro',
            "reference_id"  => $shop->comercio
        ]);

        return response()->json([
            'status' => 'success',
            'data' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::where('id',$id)->where('active',true)->get();

        return response()->json([
            'status' => 'success',
            'data' => $shop
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);

        Shop::where('id', $id)->where('active', true)
            ->update([
                'active'   => false
            ]);

        $user = Auth::user();
        Log::create([
            "user_id"       => $user->name,
            "accion"        => 'Eliminacion',
            "reference_id"  => $shop->comercio
        ]);

        return response()->json([
            'status' => 'success',
            'data' => true
        ], 200);
    }

    public function get_filter(Request $request)
    {
        if ($request->name!='') {
            $shops = Shop::where('cliente', 'like', "%{$request->name}%")->where('active', true)->get();
        }else {
            $shops = Shop::where('active', true)->get();
        }

        return response()->json([
            'status' => 'success',
            'data' => $shops
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function get_selection(Request $request)
    {
        $shops = Shop::whereIn('id', $request->shop)->where('active', true)->get();

        return response()->json([
            'status' => 'success',
            'data' => $shops
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function put_selection(Request $request)
    {
        $user = Auth::user();

        foreach ($request->shops as $key => $value) {
            $shop = Shop::find($value->id);
            Shop::where('id', $value->id)->where('active', true)
                ->update([
                    'comercio'   => $value->comercio,
                    'cliente'    => $value->cliente,
                    'correo'     => $value->correo,
                    'telefono'   => $value->telefono,
                    'pais'       => $value->pais,
                    'estado'     => $value->estado,
                    'ciudad'     => $value->ciudad,
                    'direccion'  => $value->direccion,
                    'social'     => $value->social
                ]);

            Log::create([
                "user_id"       => $user->name,
                "accion"        => 'Actualizacion',
                "reference_id"  => $shop->comercio
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => true
        ], 200);
    }
}
