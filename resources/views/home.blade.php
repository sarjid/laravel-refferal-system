@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @php
                $refferAmount = \App\Models\RefferBonus::firstOrFail();
            @endphp
            @if (count(Auth::user()->referrals) > 0)
                <div class="card-header">{{ __('My Dashboard') }}
                    <h5 style="float: right;"><strong class="text-success">Congratulations..!</strong> You Have Earn {{ count(Auth::user()->referrals) * $refferAmount->reffer_amount }}.pts</h5>
                </div>
            @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group mt-3">

                        <li class="list-group-item">Username: {{ Auth::user()->username }}</li>
                        <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
                        <li class="list-group-item"> Share This Refferal Link And Earn Points:
                            <span class="fw-code-copy">
                                <span class="fw-code-copy-button" onclick="copy();">Copy</span>
                                <code>{{ Auth::user()->referral_link }}</code>
                                <span id="custom-tooltip">copied!</sapn>
                            </span>
                        </li>
                        @if (Auth::user()->referrer)
                        <li class="list-group-item">Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</li>
                        @endif
                        <li class="list-group-item">Total Refferal: {{ count(Auth::user()->referrals)  ?? '0' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    code{
        color: black;

    }
    .fw-code-copy {
    display: block;
    position: relative;
    height: 30px;
    background: #FFE;
    border: thin solid red;
    margin-bottom: 0.5em;
    padding: 1em;
    padding-bottom: 30px;
    }
.fw-code-copy-button {
  position: absolute;
  top: 8px;
  right: 8px;
  padding: 0.25em;
  border: thin solid #777;
  background: red;
  color: #FFF;

}
.fw-code-copy-button:hover {
  border: thin solid #DDD;
  background: red;
  cursor: pointer;
}


#custom-tooltip {
    display: none;
    margin-left: 40px;
    padding: 5px 12px;
    background-color: #000000df;
    border-radius: 4px;
    color: #fff;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.3/clipboard.min.js"></script>


<script>
    function copy(){
    document.getElementById("custom-tooltip").style.display = "inline";
    document.execCommand("copy");
    setTimeout( function() {
        document.getElementById("custom-tooltip").style.display = "none";
    }, 1500);

};
</script>


<script>

new Clipboard(".fw-code-copy-button", {
  text: function(trigger) {
    return $(trigger).parent().find('code').first().text().trim();
    if (trigger) {
        alert('copied')
    }
  }
});
</script>
@endsection
