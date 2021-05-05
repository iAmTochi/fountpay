@extends('layouts.admin')

@section('page')

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header bg-success">
                    <h4 class="m-b-0 text-white">{{ $sub_title }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', ['id' => $product->id ]) }}" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" >
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="image">Price</label>--}}
                            {{--                                <input type="number" name="price" class="form-control" value="{{ old('price') }}">--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="image">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₦ </span>
                                    </div>
                                    <input type="number" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ $product->price }}">
                                    <span role="alert" class="invalid-feedback">
                                    <strong>{{$errors->first('price')}}</strong>
                                </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <img src="{{ asset($product->image) }}" alt="book" width="200">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $product->description }}</textarea>
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <a href="{{ route('products.index') }}" class="btn btn-inverse">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <link href="{{asset('back')}}/assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection


@section('scripts')
    <!-- This is data table -->
    <script src="{{asset('back')}}/assets/plugins/datatables/datatables.min.js"></script>
    <script>
        $(function () {
            $('#myTable').DataTable();
            $(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection



