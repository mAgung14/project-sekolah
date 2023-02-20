@extends('navbar.navbar')
@section('navbar')
<h2>HALAMAN MEMBER</h2>

<form action="{{ route('ciber') }}" method="post">
   @csrf
   <input type="text" name="cari" id="">
   <input type="submit" value="CARI" name="bCari">
</form>
<br>
<table border="1" class="table table-dark table-striped-columns">
     <tr>
        <td scope="col">No</td>
        <td scope="col">Nama</td>
        <td scope="col">Email</td>
        <td scope="col">No Handphone</td>
        <td scope="col" colspan="2" class="text-center">Aksi</td>
     </tr>
     @foreach ($members as $key => $value )
         <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $value -> name }}</td>
            <td>{{ $value -> email }}</td>
            <td>{{ $value -> nohp }}</td>
            <td><a href="{{ url('/member/update').'/'.$value->id }}">update</a></td>
            <td><a href="{{ url('/member/delete/'.$value->id) }}">hapus</a></td>
         </tr>
     @endforeach
</table>

{{ Session::get('pesan') }}
@endsection