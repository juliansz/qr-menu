<div class="visible-print text-center">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge($logo, 0.6, true)->errorCorrection('H')->size(300)->generate(env('APP_URL'))) !!}">
    <p>SCAN ME</p>
</div>