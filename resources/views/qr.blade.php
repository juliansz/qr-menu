<div class="visible-print text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge(asset('img/demo-logo.png'), 0.6, true)->errorCorrection('H')->size(300)->generate(env('APP_URL'))) !!}">
    <p>Scan me to return to the original page.</p>
</div>