<link rel="stylesheet" href="/css/style.css">

<div class="container">
<h1>Oil Change Result</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<p>Current Odometer: {{ $check->current_odometer }}</p>
<p>Previous Odometer: {{ $check->previous_odometer }}</p>
<p>Previous Oil Change Date: {{ $check->previous_oil_change_date }}</p>

@if ($oilChangeDue)
    <p><strong>Your vehicle is due for an oil change.</strong></p>
@else
    <p><strong>Your vehicle is not due for an oil change.</strong></p>
@endif

<a href="/">Check Another Vehicle</a>
</div>