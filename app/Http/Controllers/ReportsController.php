<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
{
        $reportes = DB::table('reports')
            ->select(
                'reports.id',
                'reports.description',
                'reports.file',
                'reports.calification',
                'reports.created_at',

                'types.name as type',
                'status.name as status',

                'citizens.phone as citizen_phone',
                'citizens.curp as citizen_curp',

                'users.name as user_name',
                'users.lastname as user_lastname',
                'users.email as user_email'
            )
            ->leftJoin('types', 'reports.type_id', '=', 'types.id')
            ->leftJoin('status', 'reports.status_id', '=', 'status.id')
            ->leftJoin('citizens', 'reports.citizen_id', '=', 'citizens.id')
            ->leftJoin('users', 'citizens.user_id', '=', 'users.id')
            ->get();

            foreach ($reportes as $reporte) {
                $reporte->formatted_created_at = Carbon::parse($reporte->created_at)
                    ->translatedFormat('d \d\e F \d\e Y \a \l\a\s H:i \h\r\s');
            }

        // return $reportes;
        return view('reports.all.index', compact('reportes'));
    }

    public function show()
    {
        $reportes = DB::table('reports')
        ->select(
            'reports.id',
            'reports.description',
            'reports.file',
            'reports.calification',
            'reports.created_at',

            'types.name as type',
            'status.name as status',

            'citizens.phone as citizen_phone',
            'citizens.curp as citizen_curp',

            'users.name as user_name',
            'users.lastname as user_lastname',
            'users.email as user_email'
        )
        ->leftJoin('types', 'reports.type_id', '=', 'types.id')
        ->leftJoin('status', 'reports.status_id', '=', 'status.id')
        ->leftJoin('citizens', 'reports.citizen_id', '=', 'citizens.id')
        ->leftJoin('users', 'citizens.user_id', '=', 'users.id')
        ->get();

        return response()->json($reportes);
    }

    public function update(Request $request, string $id)
    {

        // return $request;

        // $validacion = $request->validate([
        //     'name' => 'required|string|max:50|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', 
        //     'lastname' => 'required|string|max:50|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        //     'email' => 'required|string|email|max:50',
        // ]); 

        $reporte = Reports::find($id);
        $reporte->status_id = $request->status_id;
        $reporte->save();

        
        if ($reporte->status_id === 2) {
            return redirect()->route('reportes.index')->with([
                'message' => 'at',
                'reporte_id' => $reporte->id
            ]);
        } else {
            return redirect()->route('reportes.index')->with([
                'message' => 'ca',
                'reporte_id' => $reporte->id
            ]);
        }
        
    }
}
