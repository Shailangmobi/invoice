
@extends('index')

@section('title', 'Content')

@section('content')
<script type="text/javascript">
       if (typeof $.cookie('tokenId') === 'undefined' && typeof $.cookie('tokenUsername') === 'undefined'){
        //no cookie         
       window.location.href = "/";
        
    } 
</script>
<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    Welcome to Dashboard
                </h2>

                <p>
                   
                </p>
            </div>
        </div>
       
       
    </div>

   

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            Example text
        </span>
        Company 2015-2020
    </footer>

</div>

@endsection