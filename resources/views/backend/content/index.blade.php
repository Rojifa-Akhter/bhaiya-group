@extends('layouts.backend')
@section('title', 'list'.' '.ucwords(str_replace(['-', '_'], ' ', $type)))
@section('content')

<style>
    .table td {
        border-bottom: 1px solid #ccc !important;
    }
</style>

<div class="container mt-2">
    <div class="card card-success card-outline mb-4">
        <div class="card-header">
            <div class="card-title">List of {{ ucwords(str_replace(['-', '_'], ' ', $type)) }}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#</th> <!-- optional serial number -->
                        @foreach($contents[$type] as $field => $data)
@if($field != 'meta_description' && $field != 'created_at' && $field != 'meta_title' && $field != 'meta_keywords' && $field != 'body' && $field != 'body_2' && $field != 'body_3' && $field != 'img_paths')                        <th>{{ $data['label'] }}</th>
                        @endif
                        @endforeach

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $key=>$item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        @foreach($contents[$type] as $field => $data)
@if($field != 'meta_description' && $field != 'created_at' && $field != 'meta_title' && $field != 'meta_keywords' && $field != 'body' && $field != 'body_2' && $field != 'body_3' && $field != 'img_paths')                        @if($field=='img_path')
                        <td><img width="100px" src="{{asset('/')}}{{ $item->$field }}" alt=""> </td>
                        @elseif($field=='status')
                        <td>{{ $item->$field ==1 ? 'active':'inactive' }}
                        </td>


                        @else

                        <td>{{ $item->$field }}</td>
                        @endif

                        @endif
                        @endforeach

                        <td style="white-space: nowrap;">
                            @if($type=='albums')
                            <a href="{{ route('content.create', 'gallery') }}?parent={{$item->id}}" class="btn btn-sm btn-success">Add</a>
                            @endif
                            @if($type=='blogs')

                            <a href="{{ route('web.blog.details', $item->name) }}"
                                class="btn btn-sm btn-success">
                                View
                            </a>
                            @endif
                            <a href="{{ route('content.edit', [$type, $item->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('content.destroy', [$type, $item->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
        });
    });
</script>
@endpush