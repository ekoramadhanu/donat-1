<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Psy\Exception\ErrorException;

class Penelitian
{
    public function insert($regNum, $pin, $name, $email, $phone, $address, $service)
    {
        // Masukkan data ke database
        try {
            $ngalam_penelitian = DB::table('ngalam_penelitian')->insert([
                'no_registrasi' => $regNum,
                'pin' => $pin,
                'nama_pemohon' => $name,
                'email_pemohon' => $email,
                'nohp_pemohon' => $phone,
                'alamat_pemohon' => $address,
                'jenis_layanan' => $service
            ]);
        } catch (QueryException $e) {
            return 99;
        }
    }

    public function select($regNum, $pin)
    {
        try {
            $ngalam_penelitian = DB::select("select * from ngalam_penelitian where no_registrasi = '$regNum' && pin = '$pin'");
            if ($ngalam_penelitian == null) return null;
            return $ngalam_penelitian[0];
        } catch (QueryException $e) {
            return null;
        }
    }

    public function update(Array $attr, $regNum, $pin)
    {
        if ($this->select($regNum, $pin)->status != null) return 88;
        // Masukkan data ke database
        try {
            $ngalam_penelitian = DB::table('ngalam_penelitian')
                    ->where('no_registrasi', $regNum)
                    ->where('pin', $pin)
                    ->update($attr);
        } catch (QueryException $e) {
            return 99;
        }
    }
}
