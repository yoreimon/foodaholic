@extends('user.template_without_search', ['title' => 'Foodaholic | Keranjang User'])
@section('content')
<div class="container mt-5 mb-5">
    @if($keranjang->count() > 0)
    <form method="POST" action="{{ url('checkout') }}">
        @csrf
        @foreach($keranjang as $k => $p)
        <div class="p-5">
            <h2>{{$k}}</h2>
            @foreach($p as $i => $k)
            <tr>
                <input type="checkbox" name="produk[]" value="{{ $k->produk_id }}" id="produk_{{ $k->produk_id }}">
                <td>{{$k->nama_produk}}</td>
                <td>{{$k->foto_produk}}</td>
                <td>{{$k->harga}}</td>
                <td>{{$k->qty}}</td>
                <br>
            <tr>
                @endforeach
        </div>
        @endforeach

        <button type="submit">Checkout</button>
    </form>
    @else
    <td colspan="6" class="text-center">keranjang tidak ada</td>
    </tr>
    @endif
</div>
@endsection