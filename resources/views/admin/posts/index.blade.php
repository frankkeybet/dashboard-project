
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
                                            <th>User Name</th>
                                            <th>Title</th>
                                            <th>Comments</th>
                                            <th>Created date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                  <tbody>
                                    @foreach($posts as $post)  
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->title }}</td>
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