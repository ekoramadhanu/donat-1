<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Penelitian;
use Illuminate\Support\Facades\Storage;
use App\Captcha;

class PenelitianController extends Controller
{
    public function index()
    {
        $serviceName = 'Rekomendasi Penelitian';
        $service = 2;
        $serviceUrl = 'penelitian';

        return view('layanan')->with([
            'serviceName' => $serviceName,
            'service' => $service,
            'serviceUrl' => $serviceUrl
        ]);
    }

    public function action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'regNum' => 'required|numeric',
            'pin' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
        }

        $captcha = new Captcha();
        if ($captcha->check($request->input('g-recaptcha-response'))->success != 1) {
            return redirect()->back()->with('error', 'Terdeteksi sebagai robot');
        }

        $serviceName = 'Rekomendasi Penelitian';
        $service = 2;
        $serviceUrl = 'penelitian/update';

        // check data
        $regNum = $request->input('regNum');
        $pin = $request->input('pin');

        if ($regNum != null &&
            $pin != null
        ) {
            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $penelitian = new Penelitian();
            $data = $penelitian->select($regNum, $pin);
            if ($data == null) {
                return redirect()->back()->with('error', 'Data tidak ditemukan');
            }

            return view('layanan_submit')->with([
                'serviceName' => $serviceName,
                'service' => $service,
                'serviceUrl' => $serviceUrl,
                'data' => $data
            ]);
        }

        // if data invalid
        return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
    }

    public function actionUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'regNum' => 'required|numeric',
            'pin' => 'required',
            'nama' =>'required|max:50',
            'nama_lembaga' => 'required|max:50',
            'no_surat' => 'required|max:11',
            'perihal_surat' => 'required|max:100',
            'tanggal_surat' => 'required|date',
            'waktu_penelitian' => 'required|date',
            'judul_penelitian' => 'required|max:100',
            'tujuan' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            return view('layanan_error')->with([
                'title' => 'Ups!!',
                'msg' => 'Terdapat kesalahan input data, silahkan ulangi dari awal'
            ]);
        }

        $serviceName = 'Rekomendasi Penelitian';
        $service = 2;
        $serviceUrl = 'penelitian/upload';

        // check data
        $regNum = $request->input('regNum');
        $pin = $request->input('pin');
        $nama = $request->input('nama');
        $nama_lembaga = $request->input('nama_lembaga');
        $no_surat = $request->input('no_surat');
        $perihal_surat = $request->input('perihal_surat');
        $tanggal_surat = $request->input('tanggal_surat');
        $waktu_penelitian = $request->input('waktu_penelitian');
        $judul_penelitian = $request->input('judul_penelitian');
        $tujuan = $request->input('tujuan');

        if ($regNum != null &&
            $pin != null &&
            $nama != null &&
            $nama_lembaga != null &&
            $no_surat != null &&
            $perihal_surat != null &&
            $tanggal_surat != null &&
            $waktu_penelitian != null &&
            $judul_penelitian != null &&
            $tujuan != null
        ) {
            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $attr = [
                'nama' =>$nama,
                'nama_lembaga' => $nama_lembaga,
                'no_surat' => $no_surat,
                'perihal_surat' => $perihal_surat,
                'tanggal_surat' => $tanggal_surat,
                'waktu_penelitian' => $waktu_penelitian,
                'judul_penelitian' => $judul_penelitian,
                'tujuan' => $tujuan
            ];
            $penelitian = new Penelitian();
            $data = $penelitian->update($attr ,$regNum, $pin);

            if ($data == 99) {
                return view('layanan_error')->with([
                    'title' => 'Ups!!',
                    'msg' => 'Terdapat kesalahan input data, silahkan ulangi dari awal'
                ]);
            }

            if ($data == 88) {
                return view('layanan_error')->with([
                    'title' => 'Akses ditolak!!',
                    'msg' => 'Data yang sudah disubmit sebelumnya tidak dapat diubah'
                ]);
            }

            return view('layanan_upload')->with([
                'serviceName' => $serviceName,
                'service' => $service,
                'serviceUrl' => $serviceUrl,
                'regNum' => $regNum,
                'pin' => $pin
            ]);
        }

        // if data invalid
        return view('layanan_error')->with([
            'title' => 'Ups!!',
            'msg' => 'Terdapat kesalahan input data, silahkan ulangi dari awal'
        ]);
    }

    public function uploadDokumen(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'surat_rekomendasi' => 'mimes:pdf|max:1000',
            'surat_pengantar' => 'mimes:pdf|max:1000'
        ]);

        if ($validator->fails()) {
            return view('layanan_error')->with([
                'title' => 'Ups!!',
                'msg' => 'Terdapat kesalahan input data, silahkan cek kebutuhan upload tiap user'
            ]);
        }

        // check data
        $regNum = $request->input('regNum');
        $pin = $request->input('pin');
        $surat_rekomendasi = $request->file('surat_rekomendasi');
        $surat_pengantar = $request->file('surat_pengantar');

        if ($regNum != null &&
            $pin != null
        ) {

            $fileName = md5($regNum.$pin);

            $fileName_surat_rekomendasi = $regNum.'_surat_rekomendasi'.'.pdf';
            $surat_rekomendasi->storeAs("public/penelitian/$fileName", $fileName_surat_rekomendasi);
            $url_surat_rekomendasi = Storage::url("public/penelitian/$fileName/$fileName_surat_rekomendasi");
            $url_db_surat_rekomendasi = asset($url_surat_rekomendasi);

            $fileName_surat_pengantar = $regNum.'_surat_pengantar'.'.pdf';
            $surat_pengantar->storeAs("public/penelitian/$fileName", $fileName_surat_pengantar);
            $url_surat_pengantar = Storage::url("public/penelitian/$fileName/$fileName_surat_pengantar");
            $url_db_surat_pengantar = asset($url_surat_pengantar);

            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $attr = [
                'surat_rekomendasi'=> $url_db_surat_rekomendasi,
                'surat_pengantar'=> $url_db_surat_pengantar,
                'status'=> '1'
            ];
            $penelitian = new Penelitian();
            $data = $penelitian->update($attr ,$regNum, $pin);

            if ($data == 99) {
                return view('layanan_error')->with([
                    'title' => 'Ups!!',
                    'msg' => 'Terdapat kesalahan input data, silahkan ulangi dari awal'
                ]);
            }

            if ($data == 88) {
                return view('layanan_error')->with([
                    'title' => 'Akses ditolak!!',
                    'msg' => 'Data yang sudah disubmit sebelumnya tidak dapat diubah'
                ]);
            }

            return view('layanan_sukses');
        }

        // if data invalid
        return view('layanan_error')->with([
            'title' => 'Ups!!',
            'msg' => 'Terdapat kesalahan input data, silahkan ulangi dari awal'
        ]);
    }
}
