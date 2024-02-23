<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Departement;
use App\Models\SystemLog;

class MasterController extends Controller
{
    public function indexDept()
    {
        $title = 'Master Departemen';
        $departements = Departement::all();
        return view('master.index_department', compact(['title','departements']));
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
