
@extends('layouts.admin')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

@endsection

@section('content')

<div class="row">

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Title</th>
                                            <th>Comments</th>
                                            <th>Created date</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Title</th>
                                            <th>Comments</th>
                                            <th>Created date</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </tfoot>
                                  <tbody>
                                    @foreach($posts as $post)  
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->user->username }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->comments[0]->id }}</td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                    </tr>
                                    
                                    @endforeach
                                  </tbody>  
                                </table>
                            </div>
                        </div>
</div>

@endsection

@section('scripts')


<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

@endsection