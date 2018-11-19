<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Npsn;
use Illuminate\Support\Facades\Storage;
use App\Captcha;

class NpsnController extends Controller
{
    public function index()
    {
        $serviceName = 'Penerbitan NPSN';
        $service = 1;
        $serviceUrl = 'npsn';

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

        $serviceName = 'Penerbitan NPSN';
        $service = 1;
        $serviceUrl = 'npsn/update';

        // check data
        $regNum = $request->input('regNum');
        $pin = $request->input('pin');

        if ($regNum != null &&
            $pin != null
        ) {
            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $npsn = new Npsn();
            $data = $npsn->select($regNum, $pin);
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
            'nama_kepsek' =>'required|max:100',
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:200',
            'jenjang_sekolah' => 'required|max:10',
            'status_sekolah' => 'required|numeric',
            'provinsi' => 'required|max:100',
            'kota' => 'required|max:100',
            'kecamatan' => 'required|max:100',
            'kelurahan' => 'required|max:100',
            'email' => 'required|email',
            'no_sk_pendirian' => 'required|max:20',
            'tanggal_sk_pendirian' => 'required|date',
            'no_sk_operasional' => 'required|max:20',
            'tanggal_sk_operasional' => 'required|date'
        ]);

        if ($validator->fails()) {
            return view('layanan_error')->with([
                'title' => 'Ups!!',
                'msg' => 'Terdapat kesalahan input data, silahkan ulangi dari awal'
            ]);
        }

        $serviceName = 'Penerbitan NPSN';
        $service = 1;
        $serviceUrl = 'npsn/upload';

        // check data
        $regNum = $request->input('regNum');
        $pin = $request->input('pin');
        $nama_kepsek = $request->input('nama_kepsek');
        $nama_sekolah = $request->input('nama_sekolah');
        $alamat = $request->input('alamat');
        $jenjang_sekolah = $request->input('jenjang_sekolah');
        $status_sekolah = $request->input('status_sekolah');
        $provinsi = $request->input('provinsi');
        $kota = $request->input('kota');
        $kecamatan = $request->input('kecamatan');
        $kelurahan = $request->input('kelurahan');
        $email = $request->input('email');
        $no_sk_pendirian = $request->input('no_sk_pendirian');
        $tanggal_sk_pendirian = $request->input('tanggal_sk_pendirian');
        $no_sk_operasional = $request->input('no_sk_operasional');
        $tanggal_sk_operasional = $request->input('tanggal_sk_operasional');

        if ($regNum != null &&
            $pin != null &&
            $nama_kepsek != null &&
            $nama_sekolah != null &&
            $alamat != null &&
            $jenjang_sekolah != null &&
            $status_sekolah != null &&
            $provinsi != null &&
            $kota != null &&
            $kecamatan != null &&
            $kelurahan != null &&
            $email != null &&
            $no_sk_pendirian != null &&
            $tanggal_sk_pendirian != null &&
            $no_sk_operasional != null &&
            $tanggal_sk_operasional != null
        ) {
            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $attr = [
                'nama_kepsek' => $nama_kepsek,
                'nama_sekolah' => $nama_sekolah,
                'alamat' => $alamat,
                'jenjang_sekolah' => $jenjang_sekolah,
                'status_sekolah' => $status_sekolah,
                'provinsi' => $provinsi,
                'kota' => $kota,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'email' => $email,
                'no_sk_pendirian' => $no_sk_pendirian,
                'tanggal_sk_pendirian' => $tanggal_sk_pendirian,
                'no_sk_operasional' => $no_sk_operasional,
                'tanggal_sk_operasional' => $tanggal_sk_operasional
            ];
            $npsn = new Npsn();
            $data = $npsn->update($attr ,$regNum, $pin);

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
            'foto_depan' => 'mimes:jpg,jpeg,png|max:1000',
            'foto_samping' => 'mimes:jpg,jpeg,png|max:1000',
            'foto_belakang' => 'mimes:jpg,jpeg,png|max:1000',
            'foto_papan' => 'mimes:jpg,jpeg,png|max:1000',
            'surat_kemenkumham' => 'mimes:pdf|max:1000',
            'surat_pengantar' => 'mimes:pdf|max:1000',
            'form_pengajuan' => 'mimes:pdf|max:1000',
            'lampiran' => 'mimes:pdf|max:1000'
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
        $foto_depan = $request->file('foto_depan');
        $foto_samping = $request->file('foto_samping');
        $foto_belakang = $request->file('foto_belakang');
        $foto_papan = $request->file('foto_papan');
        $surat_kemenkumham = $request->file('surat_kemenkumham');
        $surat_pengantar = $request->file('surat_pengantar');
        $form_pengajuan = $request->file('form_pengajuan');
        $lampiran = $request->file('lampiran');

        if ($regNum != null &&
            $pin != null
        ) {

            $fileName = md5($regNum.$pin);

            $fileName_foto_depan = $regNum.'_foto_depan'.'.jpg';
            $foto_depan->storeAs("public/npsn/$fileName", $fileName_foto_depan);
            $url_foto_depan = Storage::url("public/npsn/$fileName/$fileName_foto_depan");
            $url_db_foto_depan = asset($url_foto_depan);

            $fileName_foto_samping = $regNum.'_foto_samping'.'.jpg';
            $foto_samping->storeAs("public/npsn/$fileName", $fileName_foto_samping);
            $url_foto_samping = Storage::url("public/npsn/$fileName/$fileName_foto_samping");
            $url_db_foto_samping = asset($url_foto_samping);

            $fileName_foto_belakang = $regNum.'_foto_belakang'.'.jpg';
            $foto_belakang->storeAs("public/npsn/$fileName", $fileName_foto_belakang);
            $url_foto_belakang = Storage::url("public/npsn/$fileName/$fileName_foto_belakang");
            $url_db_foto_belakang = asset($url_foto_belakang);

            $fileName_foto_papan = $regNum.'_foto_papan'.'.jpg';
            $foto_papan->storeAs("public/npsn/$fileName", $fileName_foto_papan);
            $url_foto_papan = Storage::url("public/npsn/$fileName/$fileName_foto_papan");
            $url_db_foto_papan = asset($url_foto_papan);

            $fileName_surat_kemenkumham = $regNum.'_surat_kemenkumham'.'.pdf';
            $surat_kemenkumham->storeAs("public/npsn/$fileName", $fileName_surat_kemenkumham);
            $url_surat_kemenkumham = Storage::url("public/npsn/$fileName/$fileName_surat_kemenkumham");
            $url_db_surat_kemenkumham = asset($url_surat_kemenkumham);

            $fileName_surat_pengantar = $regNum.'_surat_pengantar'.'.pdf';
            $surat_pengantar->storeAs("public/npsn/$fileName", $fileName_surat_pengantar);
            $url_surat_pengantar = Storage::url("public/npsn/$fileName/$fileName_surat_pengantar");
            $url_db_surat_pengantar = asset($url_surat_pengantar);

            $fileName_form_pengajuan = $regNum.'_form_pengajuan'.'.pdf';
            $form_pengajuan->storeAs("public/npsn/$fileName", $fileName_form_pengajuan);
            $url_form_pengajuan = Storage::url("public/npsn/$fileName/$fileName_form_pengajuan");
            $url_db_form_pengajuan = asset($url_form_pengajuan);

            $fileName_lampiran = $regNum.'_lampiran'.'.pdf';
            $lampiran->storeAs("public/npsn/$fileName", $fileName_lampiran);
            $url_lampiran = Storage::url("public/npsn/$fileName/$fileName_lampiran");
            $url_db_lampiran = asset($url_lampiran);

            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $attr = [
                'foto_depan'=> $url_db_foto_depan,
                'foto_samping'=> $url_db_foto_samping,
                'foto_belakang'=> $url_db_foto_belakang,
                'foto_papan'=> $url_db_foto_papan,
                'surat_kemenkumham'=> $url_db_surat_kemenkumham,
                'surat_pengantar'=> $url_db_surat_pengantar,
                'form_pengajuan'=> $url_db_form_pengajuan,
                'lampiran'=> $url_db_lampiran,
                'status'=> '1'
            ];
            $npsn = new Npsn();
            $data = $npsn->update($attr ,$regNum, $pin);

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
