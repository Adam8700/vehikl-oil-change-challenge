<link rel="stylesheet" href="/css/style.css">

<div class="container">
<h1>Oil Change Tracker</h1> 
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<form action="/check" method="POST">
@csrf
<label for="current_odometer">Current Odometer</label>
<input type="number" id="current_odometer" name="current_odometer" required>

<label for="previous_oil_change_date">Previous Oil Change Date:</label>
<input type="date" id="previous_oil_change_date" name="previous_oil_change_date" required>

<label for="previous_odometer">Previous Odometer:</label> 
<input type="number" id="previous_odometer" name="previous_odometer" required>

<button type="submit">Check Oil Change</button>

</form>
</div>