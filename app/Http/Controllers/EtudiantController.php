<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EtudiantController extends Controller
{
    public function index()
    {
        return etudiant::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'filliere' => 'required',
            'date_naissance' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $etudiant = etudiant::create($request->all());

        return response()->json($etudiant, 201);
    }

    public function show($id)
    {
        $etudiant = etudiant::find($id);

        if (!$etudiant) {
            return response()->json(['message' => 'etudiant not found'], 404);
        }

        return $etudiant;
    }

    public function update(Request $request, $id)
    {
        $etudiant = etudiant::find($id);

        if (!$etudiant) {
            return response()->json(['message' => 'etudiant not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'filliere' => 'required',
            'date_naissance' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $etudiant->update($request->all());

        return $etudiant;
    }

    public function destroy($id)
    {
        $etudiant = etudiant::find($id);

        if (!$etudiant) {
            return response()->json(['message' => 'etudiant not found'], 404);
        }

        $etudiant->delete();

        return response()->json(['message' => 'etudiant deleted successfully'], 200);
    }
}
