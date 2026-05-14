@extends('layouts.backend')
@section('title', 'Create'.' '.ucwords(str_replace(['-', '_'], ' ', $type)))
@section('content')
<style>
    table{
        width:100%;
    }
    th,td{
        border:1px solid black;
        padding:5px;
    }
</style>

<div class="container mt-2">
<form action="{{route('content.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type" value="{{$type}}">
     <div class="card card-success card-outline mb-4">
                  <div class="card-header"><div class="card-title">Create New {{ucwords(str_replace(['-', '_'], ' ', $type))}}  </div></div>
                  <div class="card-body">
                   
                 
       @foreach($contents[$type] as $field => $data)
              <div class="mb-3">
                     <label for="{{$field}}" class="form-label">{{ $data['label'] }}</label>

                     @php $isRequired = $data['required'] ? 'required' : ''; @endphp

                     @if($field == 'img_path')
                     <input type="file" class="form-control" id="{{$field}}" name="{{$field}}" {{ $isRequired }}>

                     @elseif($field == 'img_paths')
                     <input type="file" multiple class="form-control" id="{{$field}}" name="{{$field}}[]" {{ $isRequired }}>
                       @elseif($field == 'created_at')
                     @elseif($field == 'parent')
                       <select name="{{$field}}" id="{{$field}}" class="form-select" {{ $isRequired }}>
                            <option value="">select</option>
                            @foreach(App\Models\Content::where('type','albums')->get(['title']) as $alb)
                                   <option {{ $_GET['parent']==$alb->id ? 'selected':''}} value="{{$alb->id}}">{{$alb->title}}</option>
                            @endforeach
                     </select>
                     @elseif($field == 'short')
                    <textarea class="form-control" id="{{$field}}" name="{{$field}}" {{ $isRequired }}></textarea>
                     @elseif($field == 'status')
                     <select name="{{$field}}" id="{{$field}}" class="form-select" {{ $isRequired }}>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                     </select>
                     @elseif($field == 'start_date' || $field == 'end_date')
                     <input type="datetime-local" class="form-control" id="{{$field}}" name="{{$field}}" {{ $isRequired }}>
                     @elseif($field == 'body' || $field == 'body_2' || $field == 'body_3' || $field == 'body4' || $field == 'meta_description')
                     <textarea class=" {{$field == 'meta_description' ? 's':'editor' }} form-control" name="{{$field}}" id="{{$field}}" rows="4" {{ $isRequired }}></textarea>
                     @else
                     <input type="text" class="form-control" id="{{$field}}" name="{{$field}}" {{ $isRequired }}>
                     @endif
              </div>
       @endforeach

      
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                  <!--end::Footer-->
                </div>
</form>
</div>
@endsection
@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- bootstrap js (যদি already layout এ থাকে, আবার দিবে না) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{ asset('backend/summernote/summernote.css') }}">
<script src="{{ asset('backend/summernote/summernote.js') }}"></script>

@if($type=='blogs')
<script>
    
    $(document).ready(function(){
    
        function slugify(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/&/g, '-and-')       // & → and
                .replace(/[\s\W-]+/g, '-')    // space & special char → -
                .replace(/^-+|-+$/g, '');     // remove first & last -
        }
    
        $('#title').on('keyup change', function(){
            let title = $(this).val();
            let slug = slugify(title);
    
            $('#name').val(slug);
        });
    
    });
</script>
 
@endif
<script>
     
$(document).ready(function() {     
    $('.editor').summernote({
        height: 300,
        resizeable: true,    // summernote built-in resize
        callbacks: {
            onKeyup: function(e) { updateTagInfo(e); },
            onMouseup: function(e) { updateTagInfo(e); },
        }
    });
});

const $tooltip = $('<div id="tag-tooltip" style="'+
    'position:fixed;'+
    'background:#333;'+
    'color:#fff;'+
    'padding:3px 8px;'+
    'border-radius:4px;'+
    'font-size:11px;'+
    'font-family:monospace;'+
    'pointer-events:none;'+
    'z-index:99999;'+
    'display:none;'+
'"></div>');
$('body').append($tooltip);

function updateTagInfo(e) {
    const selection = window.getSelection();
    if (!selection || selection.rangeCount === 0) return;

    let node = selection.anchorNode;
    if (node && node.nodeType === Node.TEXT_NODE) {
        node = node.parentNode;
    }

    let tagName = null;
    let current = node;

    while (current && current !== document) {
        const tag = current.tagName ? current.tagName.toLowerCase() : '';
        if (['h1','h2','h3','h4','h5','h6','p','blockquote','li'].includes(tag)) {
            tagName = tag.toUpperCase();
            break;
        }
        current = current.parentNode;
    }

    if (!tagName) {
        $tooltip.hide();
        return;
    }

    const x = e.clientX + 10;
    const y = e.clientY - 30;

    $tooltip
        .html(`&lt;${tagName}&gt;`)
        .css({ left: x + 'px', top: y + 'px' })
        .show();

    clearTimeout(window._tagTooltipTimer);
    window._tagTooltipTimer = setTimeout(() => $tooltip.hide(), 2000);
}
  
</script>
@endpush