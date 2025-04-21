<?php

namespace App\Http\Controllers\dosen;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //
    public function index(){
        return 'menampilkan data dosen';
    }

    public function cekObject(){

        $dosen = new Dosen();
        dd($dosen);
    }
    public function insert(){

        $dosen = new Dosen();
        // dd($dosen);
        $dosen->nama="Nauval";
        $dosen->nik="1234556";
        $dosen->email="nauval3@gmail.com";
        $dosen->nohp="03824023894";
        $dosen->alamat="Jl Hijrah Tanah Sirah";
        $dosen->keahlian="Web Framework";
        $dosen->save();
        dd($dosen);
    }

    public function massAssignment(){

        $dosen = Dosen::create(
            [
                "nama"=>"Nauval",
                "nik"=>"12345566774",
                "email"=>"nauval5@gmail.com",
                "nohp"=>"03824023894",
                "alamat"=>"Jl Hijrah Tanah Sirah",
                "keahlian"=>"Web Framework Atas",
            ]
        );
        $dosen2 = Dosen::create(
            [
                "nama"=>"Kasih",
                "nik"=>"23110830232",
                "email"=>"kasih@gmail.com",
                "nohp"=>"03824023894",
                "alamat"=>"Jl Hijrah Tanah Sirah",
                "keahlian"=>"Web Framework Atas",
            ]
        );
        dd($dosen);
    }

    public function update(){

        $dosen = Dosen::find(3);
        $dosen->nama="Raya Riskiana Sakti";
        $dosen->save();
        dd($dosen);
    }

    public function updateWhere(){

        $dosen = Dosen::where('nohp', "03824023894")->first();
        $dosen->keahlian="Animasi";
        $dosen->save();
        dd($dosen);

    }
    public function massUpdate(){

        $dosen = Dosen::where('nohp', "03824023894")->first()->update(
            [
                'alamat' => 'Jalan-jalan',
                'keahlian' => 'PBL',
            ]
        );
        // $dosen->keahlian="Animasi";
        // $dosen->save();
        dd($dosen);
    }
    public function delete()
   {
       $dosen = Dosen::find(7);
       $dosen->delete();
       dd($dosen);
   }
   public function destroy()
   {
       $dosen = Dosen::destroy(6);
       dd($dosen);
   }


   public function massDelete()
   {
       $dosen = Dosen::where('keahlian', 'PBL')->delete();
       dd($dosen);
   }

   public function all()
   {
       $dosen = Dosen::all();
       foreach ($dosen as $itemDosen) {
           echo $itemDosen->id . '<br>';
           echo $itemDosen->nama . '<br>';
           echo $itemDosen->nik . '<br>';
           echo $itemDosen->email . '<br>';
           echo $itemDosen->nohp . '<br>';
           echo $itemDosen->alamat;
           echo '<hr>';
           //dd ($itemDosen);
       }
   }
   public function allView()
   {
        $dosen = Dosen::paginate(10); // This returns a paginated collection with 10 items per page
        return view('akademik.dosen', ["dsn" => $dosen]);
    
   }


   public function getWhere()
   {
       $dosen = Dosen::where('keahlian', 'Android Studio')
           ->orderBy('nama', 'asc')
           ->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function testWhere()
   {
       $dosen = Dosen::where('keahlian', 'Android Studio')
           ->orderBy('nik', 'asc')
           ->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function first()
   {
       $dosen = Dosen::where('alamat', 'Agam')->first();
       return view('akademik.dosen1', ['dosen' => $dosen]);
   }

   public function find()
   {
       $dosen = Dosen::find(3);
       return view('akademik.dosen1', ['dosen' => $dosen]);
   }

   public function latest()
   {
       $dosen = Dosen::latest()->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function limit()
   {
       $dosen = Dosen::latest()->limit(2)->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function skipTake()
   {
       $dosen = Dosen::orderBy("id")->skip(1)->take(4)->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function softDelete(){
    Dosen::where('id', '2')->delete();
    return "Data berhasil dihapus";
   }

   public function withTrashed(){
    $dosen = Dosen::withTrashed()->get();
    return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function restore(){
    Dosen::withTrashed()->where('id', '2')->restore();
    return "Data berhasil restore";
   }

   public function forceDelete(){
    Dosen::where('id', '2')->forceDelete();
    return "Data berhasil dihapus secara permanent";
   }

}
