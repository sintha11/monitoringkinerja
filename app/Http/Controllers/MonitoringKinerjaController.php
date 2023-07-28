<?php

namespace App\Http\Controllers;

use App\Models\MonitoringKinerja;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportMonitoringKinerja;

class MonitoringKinerjaController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = MonitoringKinerja::orderByDesc('created_at');

            if ($request->input('bulan') != null) {
                 $query = $query->whereMonth('created_at', $request->bulan);
            }
            return Datatables::of($query)
                    ->addColumn('action', function($data){

                           $btn = '
                            <div class="dropdown p-3">
                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="' .route('monitoringkinerja.edit', $data->id). '"><i class="fa-regular fa-pen-to-square"></i> &nbsp; Edit</a></li>
                                    <form action="'.route('monitoringkinerja.destroy', $data->id).'" method="POST">
                                     '. method_field('delete') . csrf_field() .'
                                     <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa-solid fa-trash-can"></i> &nbsp; Delete
                                     </button>
                                    </form>
                                </ul>
                            </div>
';

                            return $btn;
                    })
                    ->addColumn('indikator_kinerja', function($data){

                           $output = '<p class="text-start mt-4" style="width: 200px;">'.$data->indikator_kinerja.'</p>';

                            return $output;
                    })
                    ->addColumn('program_kegiatan', function($data){

                           $output = '<p class="text-start mt-4" style="width: 200px;">'.$data->program_kegiatan.'</p>';

                            return $output;
                    })
                    ->addColumn('target_kinerja', function($data){

                           $output = '<p class="text-start mt-4" style="width: 50px;">'.$data->target_kinerja.'</p>';

                            return $output;
                    })
                    ->addColumn('realisasi_kinerja', function($data){

                           $output = '<p class="text-start mt-4" style="width: 50px;">'.$data->realisasi_kinerja.'</p>';

                            return $output;
                    })
                    ->addColumn('capaian_kinerja', function($data){

                           $output = '<p class="text-start mt-4" style="width: 50px;">'.$data->capaian_kinerja.'</p>';

                            return $output;
                    })
                    ->addColumn('permasalahan', function($data){

                           $output = '<p class="text-start mt-4" style="width: 200px;">'.$data->permasalahan.'</p>';

                            return $output;
                    })
                    ->addColumn('tanggal', function($data){

                           $output = '<p class="text-start mt-4" style="width: 120px;">'.Carbon::parse($data->created_at)->toFormattedDateString().'</p>';

                            return $output;
                    })
                    ->rawColumns(['action', 'indikator_kinerja', 'program_kegiatan', 'target_kinerja', 'realisasi_kinerja', 'capaian_kinerja', 'permasalahan', 'tanggal'])
                    ->make();
        }

        return view('monitoringkinerja.index');

    }

    public function create()
    {
        //Menampilkan halaman create
        return view('monitoringkinerja.create');
    }

    public function store(Request $request)
    {
        //Ubah nama file gambar dengan angka random
        // $imageName = time().'.'.$request->image->extension(); // 1685433155.jpg

        //Upload file gambar ke folder slider
        // Storage::putFileAs('public/slider', $request->file('image'), $imageName);


        //Insert data ke table sliders
        $monitoringKinerja = MonitoringKinerja::create([
            'indikator_kinerja' => $request->indikator_kinerja,
            'program_kegiatan' => $request->program_kegiatan,
            'target_kinerja' => $request->target_kinerja,
            'realisasi_kinerja' => $request->realisasi_kinerja,
            'capaian_kinerja' =>  $request->capaian_kinerja,
            'permasalahan' =>  $request->permasalahan,
        ]);

        //Alihkan ke halaman slider.index
        return redirect()->route('monitoringkinerja.index');

    }

    public function edit(Request $request, $id)
    {
        //cari data berdasarkan id menggunakan find()
        //find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $monitoringKinerja = MonitoringKinerja::find($id);

        //load view edit.blade.php dan passing data slider
        return view('monitoringkinerja.edit', compact('monitoringKinerja'));
    }

    public function update(Request $request, $id)
    {
        // cek jika user mengupload gambar di form
        // if ($request->hasFile('image')) {
        //     // ambil nama file gambar lama dari database
        //     $old_image = Slider::find($id)->image;

        //     // hapus file gambar lama dari folder slider
        //     Storage::delete('public/slider/'.$old_image);

        //     // FILE BARU //
        //     // ubah nama file gambar baru dengan angka random
        //     $imageName = time().'.'.$request->image->extension();

        //     // upload file gambar ke folder slider
        //     Storage::putFileAs('public/slider', $request->file('image'), $imageName);

            // update data sliders
            MonitoringKinerja::where('id', $id)->update([
                'indikator_kinerja' => $request->indikator_kinerja,
                'program_kegiatan' => $request->program_kegiatan,
                'target_kinerja' => $request->target_kinerja,
                'realisasi_kinerja' => $request->realisasi_kinerja,
                'capaian_kinerja' =>  $request->capaian_kinerja,
                'permasalahan' => $request->permasalahan,

            ]);

        // } else {
        //     // jika user tidak mengupload gambar
            // update data sliders hnaya untuk title dan caption
        //     MonitoringKinerja::where('id', $id)->update([
        //         'indikator_kinerja' => $request->indikator_kinerja,
        //         'program_kegiatan' => $request->program_kegiatan,
        //         'target_kinerja' => $request->target_kinerja,
        //         'realisasi_kinerja' => $request->realisasi_kinerja,
        //         'capaian_kinerja' =>  $request->capaian_kinerja,
        //         'permasalahan' => $request->permasalahan,
        //     ]);
        // }


        // alihkan halaman ke halaman sliders
        return redirect()->route('monitoringkinerja.index');
    }

    public function destroy($id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $monitoringkinerja = MonitoringKinerja::find($id);

        // // hapus file gambar dari folder slider
        // Storage::delete('public/slider/'.$slider->image);

        // hapus data dari table sliders
        $monitoringkinerja->delete();

        // alihkan halaman ke halaman sliders
        return redirect()->route('monitoringkinerja.index');
    }

    public function export()
    {
        return Excel::download(new ExportMonitoringKinerja, 'monitoringkinerja.xlsx');

        // alihkan halaman ke halaman sliders
        return redirect()->route('monitoringkinerja.index');
    }
}

