<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Departement;
use App\Models\Master\Education;
use App\Models\Master\EmpStatus;
use App\Models\Master\Golongan;
use App\Models\Master\Position;
use App\Models\Master\Religion;
use App\Models\SystemLog;
use Faker\Core\Blood;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MasterController extends Controller
{
    public function indexDept(Request $request)
    {
        $title = 'Master Departemen';
        if($request->ajax()){
            $departements = Departement::all();
            return DataTables::of($departements)
            ->make(true);
        }
        return view('master.dept', compact('title'));
    }

    public function addDept(Request $request)
    {
        $validatedData = $request->validate([
            'divisi' => ['required'],
            'nama_dept' => ['required'],
            'section' => ['required'],
        ]);
        
        try {
            //code...
            $dept = Departement::create($validatedData);
            if($dept){
                $this->logData('Tambah','departement',$dept->id_dept,'null',json_encode($dept->toArray()));
            }
            
            return redirect('/master/departemen')->with('success', 'Berhasil menambahkan departemen');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/master/departemen')->with('failed', 'Gagal menambahkan departemen : ' .$th->getMessage());
            return back()->withErrors("Gagal menambahkan data");
        }
    }

    public function editDept(Request $request, $id)
    {
        $dept = Departement::find($id);
        $oldData = json_encode(($dept->toArray()));
        $dept->divisi = $request->divisi;
        $dept->nama_dept = $request->nama_dept;
        $dept->section = $request->section;
        $dept->save();
        $newData = json_encode($dept->toArray());
        $this->logData('Update','departement',$id,$oldData,$newData);
        return response()->json(['message'=>'Success']);
    }

    public function deleteDept($id)
    {
        $dept = Departement::find($id);
        $oldData = json_encode($dept->toArray());
        $dept->delete();
        $newData = json_encode($dept->toArray());
        $this->logData('Delete','departement',$id,$oldData,"Data dihapus");
        return response()->json(['message'=>'Success']);
    }

    public function indexEducation(Request $request)
    {
        $title = 'Master Education';
        if($request->ajax()){
            $education = Education::all();
            return DataTables::of($education)
            ->make(true);
        }
        return view('master.edu',compact('title'));
    }

    public function addEducation(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pendidikan' => 'required',
            'jenis_pendidikan' => 'required',
            'jurusan' => 'required',
        ],[
          'nama_pendidikan.required' => 'Pendidikan harus di isi', 
          'jenis_pendidikan.required' => 'Jenis Pendidikan harus di isi',
          'jurusan.required' => 'Jurusan harus di isi'
        ]);
        $edu = Education::create($validatedData);
        if($edu){
            $this->logData('add','education',$edu->id_education,null,json_encode($edu->toArray()));
        }
        return response()->json(['status'=>200]);
    }

    public function editEducation($id, Request $request)
    {
        $validatedData = $request->validate([
            'nama_pendidikan' => 'required',
            'jenis_pendidikan' => 'required',
            'jurusan' => 'required',
        ],[
          'nama_pendidikan.required' => 'Pendidikan harus di isi', 
          'jenis_pendidikan.required' => 'Jenis Pendidikan harus di isi',
          'jurusan.required' => 'Jurusan harus di isi'
        ]);
        $edu = Education::findOrFail($id);
        $oldData = json_encode($edu->toArray());
        $edu->update([
            'tingkat'=>$request->edit_tingkat,
            'jurusan'=>$request->edit_jurusan,
        ]);
        $this->logData('update', 'education',$edu->id_education,$oldData,json_encode($edu->toArray()));
        return response()->json(['status' =>200]);
    }

    public function deleteEducation($id)
    {
        $edu = Education::findOrFail($id);
        $oldData = json_encode($edu->toArray());
        $edu->delete();
        $this->logData('delete','education',$edu->id_education,$oldData,null);
        return response()->json(['status' =>200]);
    }

    public function indexEmpStatus(Request $request)
    {
        $title = 'Master Employee Status';
        if($request->ajax()) {
            $empstatus = EmpStatus::all()->limit(10);
            return DataTables::of($empstatus)
            ->make(true);
        } 
        return view('master.empstatus',compact('title'));     
    }

    public function addEmpsStatus()
    {
        
    }

    private function logData($activity,$tableName,$recordId,$oldData,$newData)
    {
        $output = shell_exec('ipconfig');
        preg_match('/IPv4 Address.*: ([\d.]+)/', $output, $matches);
        $ipAddress = isset($matches[1]) ? $matches[1] : 'Tidak ada informasi IP address';
        
        // Pencarian System Model
        $output1 = shell_exec('systeminfo');
        preg_match('/System Model:\s+(.+)/', $output1, $matches);
        $systemModel = isset($matches[1]) ? $matches[1] : 'Tidak ada informasi model sistem';

        $output2 = shell_exec('ipconfig');
        preg_match('/IPv6 Address[.\s]+: ([a-fA-F0-9:]+)/', $output2, $matches);
        $ip6 = isset($matches[1]) ? $matches[1] : 'Tidak ada informasi model sistem';

        $log = SystemLog::create([
            'name' => auth()->user()->name,
            'activity' => $activity,
            'table_name' => $tableName,
            'record_id' => $recordId,
            'old_data' => $oldData,
            'new_data' => $newData,
            'ip_device' => 'Device : ' . $systemModel . ', IP : ' . $ipAddress . ', IPv6 : ' . $ip6,
        ]);
    }
}
