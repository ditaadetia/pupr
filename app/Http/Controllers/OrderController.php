<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Equipment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
class OrderController extends Controller
{
    public function index($category)
    {
        $orders =[];
        if(!auth()->check() || auth()->user()->jabatan === 'admin'){
            $orders = Order::where(['category_order_id' => $category])->paginate(5);
        }
        elseif(!auth()->check() || auth()->user()->jabatan === 'kepala uptd'){
            $orders = Order::where(['category_order_id' => $category, 'ket_verif_admin' => 'verif'])->paginate(5);
        }
        if(!auth()->check() || auth()->user()->jabatan === 'kepala dinas'){
            $orders = Order::where(['category_order_id' => $category, 'ket_verif_admin' => 'verif', 'ket_persetujuan_kepala_uptd' => 'setuju'])->paginate(5);
        }
        return view('order', [
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $detail = DB::table('orders')->join('detail_orders', 'detail_orders.order_id', '=', 'orders.id')->join('equipments', 'detail_orders.equipment_id', '=', 'equipments.id')->where('orders.id', $id)->get();
        $equipment = DB::table('equipments')->join('detail_orders', 'detail_orders.equipment_id', '=', 'equipments.id')->get();
        return view('detail_order', [
            'order' => $order,
            'detail' => $detail,
            'equipment' => $equipment
        ]);
    }

    public function search(Request $request)
    {
        $pagination  = 5;
        if(!auth()->check() || auth()->user()->jabatan === 'admin'){
            $orders    = Order::when($request->keyword, function ($query) use ($request) {
                $query
                ->where('category_order_id', request('category'))
                ->whereHas('tenant', function($query) use($request) {
                    $query
                    ->where('nama', 'like', "%{$request->keyword}%")
                    ->orWhere('nama_kegiatan', 'like', "%{$request->keyword}%");
                });
            })->orderBy('created_at', 'desc')->paginate($pagination);
        }elseif(!auth()->check() || auth()->user()->jabatan === 'kepala uptd'){
            $orders    = Order::when($request->keyword, function ($query) use ($request) {
                $query
                ->where('category_order_id', request('category'))
                ->where('ket_verif_admin', '=', 'verif')
                ->whereHas('tenant', function($query) use($request) {
                    $query
                    ->where('nama', 'like', "%{$request->keyword}%")
                    ->orWhere('nama_kegiatan', 'like', "%{$request->keyword}%");
                });
            })->orderBy('created_at', 'desc')->paginate($pagination);
        }elseif(!auth()->check() || auth()->user()->jabatan === 'kepala dinas'){
            $orders    = Order::when($request->keyword, function ($query) use ($request) {
                $query
                ->where('category_order_id', request('category'))
                ->where('ket_persetujuan_kepala_uptd', '=>', 'setuju')
                ->whereHas('tenant', function($query) use($request) {
                    $query
                    ->where('nama', 'like', "%{$request->keyword}%")
                    ->orWhere('nama_kegiatan', 'like', "%{$request->keyword}%");
                });
            })->orderBy('created_at', 'desc')->paginate($pagination);
        }
        $orders->appends($request->only('keyword'));

        // $equipments    = Equipment::when($request->keyword, function ($query) use ($request) {
        //         $query
        //         ->where('nama', 'like', "%{$request->keyword}%");
        // })->orderBy('created_at', 'desc')->paginate($pagination);
        // $equipments->appends($request->only('keyword'));

        // dd(DB::getQueryLog());
        return view('order', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function downloadPermohonan($id){
        $model_file = Order::findOrFail($id); //Mencari model atau objek yang dicari
        $file = public_path() . '/storage/permohonan/' . $model_file->surat_permohonan;//Mencari file dari model yang sudah dicari
        return response()->download($file, $model_file->surat_permohonan); //Download file yang dicari berdasarkan nama file
    }

    public function downloadAkta($id){
        $model_file = Order::findOrFail($id); //Mencari model atau objek yang dicari
        $file = public_path() . '/storage/akta/' . $model_file->akta_notaris;//Mencari file dari model yang sudah dicari
        return response()->download($file, $model_file->akta_notaris); //Download file yang dicari berdasarkan nama file
    }


    public function verifAdmin(Order $id){
        $tes=$id->id;
        $result = DB::transaction(function () use ($id) {
            $id->update([
                'ket_verif_admin' => 'verif'
            ]);
            return $id->save();
        });

        if ($result) {
            //redirect dengan pesan sukses
            return redirect()->action([DokumenSewaController::class, 'dokumenSewa'], ['id' => $tes]);
        } else {
            //redirect dengan pesan error
            return redirect()->route('index', ['category' => '1'])->with('error', 'Verifikasi pengajuan penyewaan gagal!');
        }
    }

    public function tolakAdmin(Request $request, Order $id){
        $validated = $request->validate([
            'alasan' => 'string',
        ]);

        $result = DB::transaction(function () use ($validated, $request, $id) {
            $id->update([
                'ket_verif_admin' => 'tolak',
                'ket_konfirmasi' => $validated['alasan'],
            ]);
            return $id->save();
        });

        if ($result) {
            //redirect dengan pesan sukses
            return redirect()->route('index', ['category' => '1'])->with('success', 'Penolakan pengajuan penyewaan berhasil!');
        } else {
            //redirect dengan pesan error
            return redirect()->route('index', ['category' => '1'])->with('error', 'Penolakan pengajuan penyewaan gagal!');
        }
    }

    public function setujuKepalaUPTD($id){
        $order = Order::findOrFail($id);
        return view('signature_pad', [
            'order' => $order
        ]);
    }

    public function ttdKepalaUPTD(Request $request, Order $id){
        $folderPath = public_path('storage/ttd-kepala-uptd/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = uniqid() . '.'.$image_type;
        file_put_contents($folderPath . $file, $image_base64);
        // echo "<h3><i>Upload Tanda Tangan Berhasil..</i><h3>";

        if($file) {
            $sukses = DB::transaction(function () use ($id, $file) {
            $id->update([
                'ket_persetujuan_kepala_uptd' => 'setuju',
                'ttd_kepala_uptd' => 'ttd-kepala-uptd/' . $file
            ]);
            return $id->save();
            });

            if ($sukses) {
                //redirect dengan pesan sukses
                return redirect()->action([DokumenSewaController::class, 'dokumenSewa'], ['id' => $id]);
            } else {
                //redirect dengan pesan error
                return redirect()->route('index', ['category' => '1'])->with('error', 'Persetujuan pengajuan penyewaan gagal!');
            }
        }
    }

    public function tolakKepalaUPTD(Request $request, Order $id){
        $validated = $request->validate([
            'alasan' => 'string',
        ]);

        $result = DB::transaction(function () use ($validated, $request, $id) {
            $id->update([
                'ket_persetujuan_kepala_uptd' => 'tolak',
                'ket_konfirmasi' => $validated['alasan'],
            ]);
            return $id->save();
        });

        if ($result) {
            //redirect dengan pesan sukses
            return redirect()->route('index', ['category' => '1'])->with('success', 'Penolakan pengajuan penyewaan berhasil!');
        } else {
            //redirect dengan pesan error
            return redirect()->route('index', ['category' => '1'])->with('error', 'Penolakan pengajuan penyewaan gagal!');
        }
    }

    public function setujuKepalaDinas($id){
        $order = DB::table('orders')
        ->join('tenants', 'orders.tenant_id', '=', 'tenants.id')
        ->where('orders.id', $id)
        ->select('orders.id', 'orders.nama_instansi', 'tenants.nama', 'orders.nama_kegiatan', 'ket_persetujuan_kepala_dinas', 'ttd_kepala_dinas')
        ->first();

        $detail = DB::table('orders')
        ->join('detail_orders', 'detail_orders.order_id', '=', 'orders.id')
        ->join('equipments', 'detail_orders.equipment_id', '=', 'equipments.id')
        ->where('orders.id', $id)
        ->select('orders.id', 'equipments.nama')
        ->get();

        $kepala_dinas = DB::table('users')->where('jabatan', 'kepala dinas')->first();

        return view('surat_persetujuan_kepala_dinas', [
            'order' => $order,
            'detail' => $detail,
            'kepala_dinas' => $kepala_dinas,
        ]);
    }

    public function ttdKepalaDinas(Request $request, Order $id){
        $folderPath = public_path('storage/ttd-kepala-dinas/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = uniqid() . '.'.$image_type;
        file_put_contents($folderPath . $file, $image_base64);
        // echo "<h3><i>Upload Tanda Tangan Berhasil..</i><h3>";

        if($file) {
            $sukses = DB::transaction(function () use ($id, $file) {
            $id->update([
                'ket_persetujuan_kepala_dinas' => 'setuju',
                'ttd_kepala_dinas' => 'ttd-kepala-dinas/' . $file
            ]);
            return $id->save();
            });

            // // instantiate and use the dompdf class
            // $pdf = PDF::loadView('dokumen_sewa', $data);
            // return $pdf->download('tutsmake.pdf');

            // if ($sukses) {
            //     //redirect dengan pesan sukses
            //     return redirect()->action([DokumenSewaController::class, 'dokumenSewa'], ['id' => $tes]);
            // } else {
            //     //redirect dengan pesan error
            //     return redirect()->route('index', ['category' => '1'])->with('error', 'Persetujuan pengajuan penyewaan gagal!');
            // }
            if ($sukses) {
                //redirect dengan pesan sukses
                return redirect()->action([DokumenSewaController::class, 'dokumenSewa'], ['id' => $id]);
            } else {
                //redirect dengan pesan error
                return redirect()->route('index', ['category' => '1'])->with('error', 'Penolakan pengajuan penyewaan gagal!');
            }
        }
    }
    public function generateSuratPersetujuan($id){
        $order = Order::findOrFail($id);
        return view('signature_pad', [
            'order' => $order
        ]);
    }

    public function tolakKepalaDinas(Request $request, Order $id){
        $validated = $request->validate([
            'alasan' => 'string',
        ]);

        $result = DB::transaction(function () use ($validated, $request, $id) {
            $id->update([
                'ket_persetujuan_kepala_dinas' => 'tolak',
                'ket_konfirmasi' => $validated['alasan'],
            ]);
            return $id->save();
        });

        if ($result) {
            //redirect dengan pesan sukses
            return redirect()->route('index', ['category' => '1'])->with('success', 'Penolakan pengajuan penyewaan berhasil!');
        } else {
            //redirect dengan pesan error
            return redirect()->route('index', ['category' => '1'])->with('error', 'Penolakan pengajuan penyewaan gagal!');
        }
    }
}
