<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PuskesmasController extends Controller
{
    //
    public function home()
    {
        $noAbsen = '15';
        $nama = 'Hunayn Risatayn';
        $nim = '1841720148';
        return view('homePuskesmas', [
            'noAbsen' => $noAbsen, 'nama' => $nama,
            'nim' => $nim
        ]);
    }

    public function dokter()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/dokter', [
            'query' => []
        ]);

        $result = json_decode($response->getBody(), true);

        // return $result['data'];
        return view('dokter', ['dokter' => $result['data']]);
    }

    public function dokterDetail($id_dok)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/dokter', [
            'query' => [
                'id_dok' => $id_dok
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        // return $result['data'];
        return view('dokterDetail', ['dokter' => $result['data']]);
    }

    public function poliklinik()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/poliklinik', [
            'query' => []
        ]);

        $result = json_decode($response->getBody(), true);

        // return $result['data'];
        return view('poliklinik', ['poliklinik' => $result['data']]);
    }

    public function transaksi()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/transaksi', [
            'query' => []
        ]);

        $result = json_decode($response->getBody(), true);

        // return $result['data'];
        return view('transaksi', ['transaksi' => $result]);
    }

    public function transaksiEdit($id_trans)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/transaksi', [
            'query' => [
                'id_trans' => $id_trans
            ]
        ]);

        $result['trans'] = json_decode($response->getBody(), true);

        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/pasien', [
            'query' => []
        ]);

        $result['pas'] = json_decode($response->getBody(), true);

        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/poliklinik', [
            'query' => []
        ]);

        $result['pol'] = json_decode($response->getBody(), true);

        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/dokter', [
            'query' => []
        ]);

        $result['dok'] = json_decode($response->getBody(), true);

        return view('transaksiEdit', ['data' => $result]);

        // return ['data' => $result];
        // return view('transaksiEdit', ['transaksi' => $result]);
    }

    public function transaksiUpdate(Request $request)
    {
        $client = new Client();
        $data = [
            "id_trans" => $request->id,
            "id_pas" => $request->id_pas,
            "id_pol" => $request->id_pol,
            "id_dok" => $request->id_dok,
            "tanggal_pukul" => $request->tanggal_pukul
        ];
        // $this->db->where('id_trans', $this->input->post('id_trans'));
        // $this->db->update('transaksi', $data);

        $response = $client->request('PUT', 'http://puskesmas.tugas-ti-2b.com/api/transaksi', [
            'form_params' => $data
        ]);

        return redirect('/puskesmas/transaksi');
    }

    public function transaksiAdd()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/pasien', [
            'query' => []
        ]);

        $result['pas'] = json_decode($response->getBody(), true);

        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/poliklinik', [
            'query' => []
        ]);

        $result['pol'] = json_decode($response->getBody(), true);

        $response = $client->request('GET', 'http://puskesmas.tugas-ti-2b.com/api/dokter', [
            'query' => []
        ]);

        $result['dok'] = json_decode($response->getBody(), true);

        // return ['data' => $result];
        return view('transaksiAdd', ['data' => $result]);
    }

    public function transaksiSave(Request $request)
    {
        $client = new Client();
        $data = [
            "id_pas" => $request->id_pas,
            "id_pol" => $request->id_pol,
            "id_dok" => $request->id_dok,
            "tanggal_pukul" => $request->tanggal_pukul
        ];
        // $this->db->where('id_trans', $this->input->post('id_trans'));
        // $this->db->update('transaksi', $data);

        $response = $client->request('POST', 'http://puskesmas.tugas-ti-2b.com/api/transaksi', [
            'form_params' => $data
        ]);

        return redirect('/puskesmas/transaksi');
    }

    public function transaksiDelete(Request $request)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://puskesmas.tugas-ti-2b.com/api/transaksi', [
            'form_params' => [
                'id_trans' => $request->id
            ]
        ]);

        return redirect('/puskesmas/transaksi');
    }

    public function logout()
    {
        return view('login');
    }
}
