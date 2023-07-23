<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // load data dari table sliders
        $users = User::all();

        // Passing data sliders ke view slider.index
        return view('user.index', compact('users'));
        
    }

    public function create()
    {
        //Menampilkan halaman create
        return view('user.create');
    }

    public function store(Request $request)
    {
        //Ubah nama file gambar dengan angka random
        // $imageName = time().'.'.$request->image->extension(); // 1685433155.jpg

        //Upload file gambar ke folder slider
        // Storage::putFileAs('public/slider', $request->file('image'), $imageName);


        //Insert data ke table sliders
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        //Alihkan ke halaman slider.index
        return redirect()->route('user.index');

    }

    public function edit(Request $request, $id)
    {
        //cari data berdasarkan id menggunakan find()
        //find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $user = user::find($id);

        //load view edit.blade.php dan passing data slider
        return view('user.edit', compact('user'));
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
            user::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password')
                
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
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $user = user::find($id);

        // // hapus file gambar dari folder slider
        // Storage::delete('public/slider/'.$slider->image);

        // hapus data dari table sliders
        $user->delete();

        // alihkan halaman ke halaman sliders
        return redirect()->route('user.index');
    }
}

