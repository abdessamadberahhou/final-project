<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/sweetalerts.js')}}"></script>
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div>
            <script style="white-space: break-spaces">
                swal ( "Erreur" ,  "{{$error}}" ,  "error" );
            </script>
        </div>
    @endforeach
@endif

@if(session('success'))
        <div>
            <script style="white-space: break-spaces">
                swal("{{session('success')}}", "", "success");
            </script>
        </div>
@endif
@if(session('error'))
    <div>
        <script style="white-space: break-spaces">
            swal("{{session('error')}}", "", "error");
        </script>
    </div>
@endif
