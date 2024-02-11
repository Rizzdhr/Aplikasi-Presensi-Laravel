<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kelas;
use PDF;

class LaporanController extends Controller
{
    public function index(){
        $resource = Kelas::all();
        return view('laporans.datakelas', ['resource' => $resource]);
    }

    public function show($id){
        $resource = Kelas::find($id);
            return view('laporans.laporan', ['resource' => $resource]);
        }


    public function pdf(Request $request){
        $resource = Kelas::find($request->id);
        foreach($resource->siswa as $index => $res){
            $hadir=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Hadir');
            $alpha=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Alpha');
            $izin=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Izin');
            $sakit=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Sakit');
            if($request->tanggal_awal != 0){
                $hadir=$hadir->where('tanggal','>=',$request->tanggal_awal);
                $alpha=$alpha->where('tanggal','>=',$request->tanggal_awal);
                $izin=$izin->where('tanggal','>=',$request->tanggal_awal);
                $sakit=$sakit->where('tanggal','>=',$request->tanggal_awal);
            }
            if($request->tanggal_akhir != 0){
                $hadir=$hadir->where('tanggal','<=',$request->tanggal_akhir);
                $alpha=$alpha->where('tanggal','<=',$request->tanggal_akhir);
                $izin=$izin->where('tanggal','<=',$request->tanggal_akhir);
                $sakit=$sakit->where('tanggal','<=',$request->tanggal_akhir);
            }
            $hadir=$hadir->get();
            $alpha=$alpha->get();
            $izin=$izin->get();
            $sakit=$sakit->get();
        }
        if($request->tgl_awal==$request->tgl_akhir || $request->tgl_awal=="" || $request->tgl_akhir==""){
            $tanggal="-";
        }else{
            $tanggal = DATE('d F Y',strtotime($request->tgl_awal))." / ".DATE('d F Y',strtotime($request->tgl_akhir));
        }
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'potrait');
        $pdf->loadHTML(view("layouts.pribadipdf",['resource'=>$resource, 'tanggal'=>$tanggal, 'hadir'=>$hadir,'alpha'=>$alpha,'izin'=>$izin,'sakit'=>$sakit]));
        return $pdf->stream();
    }
    public function rekap($id){
        $resource = Kelas::find($id);
        return view('admin/rekapabsensi',['resource' => $resource]);
    }
    public function hitung(Request $request){
        $resource = Kelas::find($request->id);
        foreach($resource->siswa as $index => $res){
            $hadir=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Hadir');
            $alfa=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Alfa');
            $izin=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Izin');
            $sakit=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Sakit');
            if($request->tanggal_awal != 0){
                $hadir=$hadir->where('tanggal','>=',$request->tanggal_awal);
                $alfa=$alfa->where('tanggal','>=',$request->tanggal_awal);
                $izin=$izin->where('tanggal','>=',$request->tanggal_awal);
                $sakit=$sakit->where('tanggal','>=',$request->tanggal_awal);
            }
            if($request->tanggal_akhir != 0){
                $hadir=$hadir->where('tanggal','<=',$request->tanggal_akhir);
                $alfa=$alfa->where('tanggal','<=',$request->tanggal_akhir);
                $izin=$izin->where('tanggal','<=',$request->tanggal_akhir);
                $sakit=$sakit->where('tanggal','<=',$request->tanggal_akhir);
            }
            $hadir=$hadir->get();
            $alfa=$alfa->get();
            $izin=$izin->get();
            $sakit=$sakit->get();
?>
<tr>
    <td class="text-center"><?php echo $index+1 ?></td>
    <td><?php echo $res->nis ?></td>
    <td><?php echo $res->nama ?></td>
    <td><?php echo count($hadir) ?></td>
    <td><?php echo count($alfa) ?></td>
    <td><?php echo count($izin) ?></td>
    <td><?php echo count($sakit) ?></td>
</tr>
<?php

        }
    }
}
