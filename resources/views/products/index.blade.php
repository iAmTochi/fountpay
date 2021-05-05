@extends('layouts.admin')

@section('page')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <h6 class="card-subtitle">{{$sub_title}}</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><img src="{{ asset($product->image) }}" alt="book" width="100"></td>
                                <td>{{ $product->name }}</td>
                                <td>₦{{ number_format($product->price, 2)  }}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['id' => $product->id ]) }}" class="btn btn-xs btn-info" >Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', ['id' => $product->id ]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-danger" onclick="alert('Are you sure you want to delete this product')">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Row -->

    <!-- Row -->
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
