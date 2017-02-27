@if(Session::has('success')) <!--Checks if 'success' flash session is created-->
    <div class="alert alert-success" role="alert">
        <lead>{{ Session::get('success') }}</lead><!--Displays the success message stored in the flash session-->
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <lead>Failed:</lead>
        <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li><!--Displays the error messages stored in the flash session-->
        @endforeach
        </ul>
    </div>
@endif
