@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

<style>
    .float-right {
        width: 50%;
    }
    .float-left {
        width: 50%;
    }
    .float-right a.btn.btnbr.btn-sm, .float-right .btnCreate {
        display: block;
        text-align: right;
        margin: 0 0 0 auto;
        width: max-content;
    }
    td.float-right form {
        text-align: end;
    }
    .flex.justify-between.flex-1 {
        display: none;
    }
    nav.flex.items-center.justify-between {
        margin-bottom: 40px;
    }


    /* Para que la paginación de Livewire se vea bien */
    .flex.justify-between.flex-1.sm\:hidden {
        display: none;
    }

    .items-center.justify-between {
        justify-content: center !important;
    }

    /* En tu archivo app.css o en un tag style */
.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
}

.pagination .page-link {
    color: #0d6efd;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
}

nav.d-flex p.small.text-muted {
    display: none;
}

.btn-group {
    margin: 0 0 0 auto !important;
    display: block !important;
    width: max-content;
}

/* En tu archivo CSS */
.btn-export {
    margin-left: 5px;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.btn-export i {
    margin-right: 5px;
}
</style>
{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<style type="text/css">

    {{-- You can add AdminLTE customizations here --}}
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

</style>
@endpush