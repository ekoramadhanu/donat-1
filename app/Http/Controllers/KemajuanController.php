<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Npsn;
use App\Penelitian;
use App\Captcha;

class KemajuanController extends Controller
{
    public function index()
    {
        return view('kemajuan');
    }

    public function action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'regNum' => 'required|numeric|max:11',
            'pin' => 'required|max:200',
            'service' => 'required|max:3'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
        }

        $captcha = new Captcha();
        if ($captcha->check($request->input('g-recaptcha-response'))->success != 1) {
            return redirect()->back()->with('error', 'Terdeteksi sebagai robot');
        }

        // check data
        $regNum = $request->input('regNum');
        $pin = $request->input('pin');
        $service = $request->input('services');

        if ($regNum != null &&
            $pin != null &&
            $service != null &&
            $service != 0
        ) {
            // Ambil data dari database
            // Jika data sukses dimasukkan di return ke view('registrasi_sukses')
            $serviceName = '';
            switch ($service) {
            case 1 :
                $serviceName = 'Penerbitan NPSN';
                $npsn = new Npsn();
                $data = $npsn->select($regNum, $pin);
                if ($data == null) {
                    return redirect()->back()->with('error', 'Data tidak ditemukan');
                }
            case 2 :
                $serviceName = 'Rekomendasi Penelitian';
                $penelitian = new Penelitian();
                $data = $npsn->select($regNum, $pin);
                if ($data == null) {
                    return redirect()->back()->with('error', 'Data tidak ditemukan');
            }

            return view('lihat_kemajuan')->with([
                'serviceName' => $serviceName,
                'data' => $data
            ]);
        }
    }

        // if data invalid
        return redirect()->back()->with('error', 'Mohon masukkan data dengan benar');
    }
}
