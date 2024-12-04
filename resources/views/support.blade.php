@extends('layout.master')

@section('title', 'Support and FAQ')

@section('content')

<div>
    <div class="support">
        <div class="support-form">
            <h2>How can we help?</h2>
            <p>Please refer to our <a href="#sfaq"><strong>FAQ</strong></a> to see if your concerned has been answered</p>
            <form>
                <label>Email: </label>
                <input type="email" placeholder="Your e-mail">
                <label>Problem:</label>
                <textarea placeholder="Please explain your problem"></textarea>
                <button>Submit</button>
            </form>
        </div>
    </div>
    <div class="faq" id="sfaq">
        <h3>Frequently Asked Question</h3>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                How does FoodForAll work?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                My account's having problems
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                How can I see my transactions?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                How can I refund my transaction?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                How can I change my personal information?
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Security and privacy concerned
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                Does FoodForAll take a cut of my donations?
              </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet arcu a dolor malesuada laoreet sit amet eu tortor. Fusce efficitur aliquam neque, at commodo turpis pretium sit amet. Aenean vehicula eros lacinia nibh pulvinar, nec vulputate mi ullamcorper. Nullam sed sodales tellus, quis feugiat ante. Nullam convallis turpis quis iaculis rutrum.</p>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/support.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush