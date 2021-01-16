@extends('adminlte::page')

@section('title', 'Landings')

@section('content_header')
    <h1>Landings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $landing->name }} QR</h3>
                    <div class="card-tools">
                        <a class="btn btn-success btn-sm" onClick="printDiv()" href="#">Print</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('admin.landings.index') }}">Return</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" name="form-size">
                        <div class="row">
                            <div class="col-9 col-md-4">
                                <div class="form-group">
                                    <label for="type">Select the size</label>
                                    <select name="size" id="size" class="form-control" onchange="this.form.submit()">
                                        <option value="small"  @if($size === config('qr.qr-small-size')) selected @endif>Small ({{ config('qr.qr-small-size') }} x {{ config('qr.qr-small-size') }})</option>
                                        <option value="medium" @if($size === config('qr.qr-medium-size')) selected @endif>Medium ({{ config('qr.qr-medium-size') }} x {{ config('qr.qr-medium-size') }})</option>
                                        <option value="large"  @if($size === config('qr.qr-large-size')) selected @endif>Large ({{ config('qr.qr-large-size') }} x {{ config('qr.qr-large-size') }})</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 col-xl-1">
                                <div class="form-group">
                                    <label for="type">Use logo</label>
                                    <input type="checkbox" name="logo" id="logo" class="form-control" value="1" @if($use_logo) checked @endif onchange="this.form.submit()">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="visible-print text-center" id="qr">
                        @if($use_logo)
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge($logo, 0.6, true)->errorCorrection('H')->size($size)->generate($landing->url)) !!}">
                        @else
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->errorCorrection('H')->size($size)->generate($landing->url)) !!}">
                        @endif
                        <br><br>
                        <h4>{{ $landing->name }}</h4>
                        <h5>{{ $landing->link }}</h5>
                    </div>
                    <a class="btn btn-success btn-sm" onClick="printDiv()" href="#">Print</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv()
        {
            var divToPrint=document.getElementById('qr');
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
            newWin.document.close();
            setTimeout(function(){newWin.close();},10);
        }
    </script>
@stop