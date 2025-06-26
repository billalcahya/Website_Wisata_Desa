<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        $nomor = '6285713366268'; 
        $text = "Halo, saya {$data['nama']} dengan email ({$data['email']}) ingin menghubungi Anda. Perihal :\n\n{$data['pesan']}";

        $whatsappLink = "https://wa.me/{$nomor}?text=" . urlencode($text);

        return redirect()->away($whatsappLink);
    }
}

