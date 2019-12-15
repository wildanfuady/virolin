@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Subscribers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subscribers</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- <a href="{{route('user.create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a> --}}
                Users
            </div>
            <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ \Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (Auth::user()['level'] == 'admin')
                    <a class="btn btn-sm btn-success" href="{{ route('subscribers.create') }}"><i class="fa fa-plus">Tambah</i></a>
                @endif
                <table class="table table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Subscriber Name</th>
                            <th>Subscriber Email</th>
                            <th>Subscriber No Hp</th>
                            <th>User</th>
                            <th>Landing Page id</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($subscribers as $item)
                        {{-- {{die($item)}} --}}
                        <tr>
                            <td>{{$no++}}</td>
                            <td> {{$item->subscriber_name}} </td>
                            <td>{{$item->subscriber_email}}</td>
                            <td> {{$item->subscriber_nohp}} </td>
                            <td> {{$item->user->name}} </td>
                            <td> {{$item->lp_id}} </td>
                            <td>
                                @if (Auth::user()['level'] == 'admin')
                                    <form action="{{ route('subscribers.destroy', $item->id) }}" method="post">
                                        {{-- <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> --}}
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#Muser{{$item->id}}"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#MuserEdit{{$item->id}}"><i class="fa fa-edit"></i></button>
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                @else
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#Muser{{$item->id}}"><i class="fa fa-eye"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
