@extends('layouts.master')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-8 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('blog.create')}}" class="btn btn-md btn-success mb-3">Tambah Blog</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $blog)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/blogs/').$blog->image}}" alt="" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $blog->title}}</td>
                                    <td>{!! $blog->content !!}</td>
                                    <td class="text-center">
                                        <form action="{{ route('blog.destroy', $blog->id) }}" onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST">
                                        <a href="{{ route('blog.edit', $blog->id)}}" class="btn btn-sm btn-primary"></a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Blog Belum Tersedia
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection