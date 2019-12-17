@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

<?php
    // var_dump($data['name']);die();
    if(Auth::user()['id'] == null){
        $user = $user->name;
        $user_id = $user->id;
    }else{
        $user = Auth::user()['name']; 
        $user_id = Auth::user()['id'];
    }
    $product = \App\Order::with(['user','product','bank'])->where('user_id', $user_id)->first();
    // die($user_id);
    $kd_unik = rand(100, 999);
    $total = $kd_unik + $product->product->product_price;
?>    

@component('mail::table')

| Name          | Value         |
| ------------- |:-------------:|
| Nama Produk       |{{$product->product->product_name}}|   
| No Invoice        |{{$product->invoice}}|    
| Jumlah            |1|    
| Harga             |{{$product->product->product_price}}|    
| Kode Unik         |{{$kd_unik}}|    
| Total             |{{$total}}|    
| Pilihan Bank      |{{$product->bank->bank_name}}|    
| No Rek            |{{$product->bank->bank_number}}|    
| an. Nama          |{{$product->bank->bank_nasabah}}|    

@endcomponent

Mohon ditransfer sejumlah Rp. {{ number_format($total) }} ,- sebelum {{ date('d-m-Y H:i', strtotime($product->order_end)) }}

Setelah melakukan transfer, Anda bisa melakukan konfirmasi pembayaran melalui tombol di bawah ini:

@component('mail::button', ['url' => 'http://127.0.0.1:8000/konfirmasi-pembayaran', 'color' => $color])
Konfirmasi Pembayaran
@endcomponent

Terima kasih telah menggunakan Virolin.

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Hormat Kami'),<br>
{{-- {{ config('app.name') }} --}} Tim Virolin
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
