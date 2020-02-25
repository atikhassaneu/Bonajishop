<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Filemanager</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <h1 class="page-header">Integration Demo Page</h1>

    <div class="row">


        <div class="col-md-6">

            <div class="input-group">
              <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                </a>
              </span>
                <input id="thumbnail" class="form-control" type="hidden" name="filepath">
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
    </div>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>

</script>




<script>

</script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}

    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    $('#lfm').filemanager('image', {prefix: route_prefix});

</script>

</body>
</html>
