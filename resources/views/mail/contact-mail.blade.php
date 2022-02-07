  @component('mail::message')
  Pengirim: {{ $request->nama }} <br>
  Email: {{ $request->email }} <br>
  Whatsapp: {{ $request->telepon }} <br>
  Alamat: <br>
  {{ $request->alamat }}

  # Pertanyaan
  {{ $request->pertanyaan }}

  Terimakasih,<br>
  {{ $request->nama }}
  @endcomponent