@extends('layouts.app')
@section('header')

@endsection
@section('content')
<a href="/Category/create" class="btn btn-primary">Add Categories</a>
<br><br>


@if(count($category)>0)
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <th>Category name</th>
                    <th>Date updated</th>
                    <th>Edit</th>

                    @foreach ($category as $categorys)
                    <tr>
                    <td>{{$categorys->Categoryname}}</td>
                    <td>{{$categorys->updated_at}}</td>
                    <td><a href="/Category/{{$categorys->id}}/edit" class="btn btn-info">Edit</a></td>
                    <td> {!!Form::open(['action'=>['CategoryController@destroy',$categorys->id],'method'=>'POST','class'=>'pull-right'])!!}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}</td>
                    </tr>

                    @endforeach
                </table>
                <div class="row">
                    <div class="col-12 text-center">
                    {{ $category->links() }}
                    </div>
                </div>
                @endif

                <a href="/home" class="btn btn-primary">Back</a>

@endsection
