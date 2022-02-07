<?php

namespace App\Http\Livewire\Lead;

use App\Mail\ContactMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Modules\Lead\Entities\Lead;

class Form extends Component
{
    public $nama, $telepon, $email, $alamat, $pertanyaan;

    protected $rules = [
        'nama' => 'required|min:3|max:191|regex:~^[\p{L}\p{Z}]+$~u',
        'telepon' => 'required|min:10|max:15|regex:/^[0-9 +-]/',
        'email' => 'required|email|max:191',
        'alamat' => 'required|min:7|max:191',
        'pertanyaan' => 'required|min:10',
    ];

    protected $messages = [
        'required' => ':attribute tidak boleh kosong.',
        'min' => ':attribute minimal :min karakter.',
        'max' => ':attribute maksimal :max karakter.',
        'email' => 'format :attribute tidak sesuai',
        'nama.regex' => 'nama hanya diperbolehkan alfabet',
    ];

    public function submitForm()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'email' => $this->email,
            'telepon' => $this->telepon,
            'alamat' => $this->alamat,
            'pertanyaan' => $this->pertanyaan,
        ];

        $lead = new Lead();
        $lead->lead_type = 'umum';
        $lead->name = $this->nama;
        $lead->email = $this->email;
        $lead->phone = $this->telepon;
        $lead->address = $this->alamat;
        $lead->question = $this->pertanyaan;
        $lead->status = 'belum diproses';
        $lead->save();

        try {
            Mail::to('greenparkjogja.website@gmail.com')
                ->send(new ContactMail($data));
        } catch (Exception $e) {
            //
        }

        $this->dispatchBrowserEvent('success', 'Pertanyaan berhasil dikirim. Tunggu respon kami selanjutnya melalui email yang dikirimkan.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.lead.form');
    }
}