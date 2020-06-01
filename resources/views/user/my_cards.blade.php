<h3 class="text-center mt-20 mb-50">My Cards</h3>


<div class="row  justify-content-center">

  <div class="row w-75 align-items-center">

    <div class="col-5 mb-10">
      <h4>Your credit or debit cards</h3>
    </div>

    <div class="col-2 offset-3 mb-10">
      <h5>expires at</h5>
    </div>
  </div>

   @foreach($cards as $card)

  <div class="user-card row w-75 border bg-light align-items-center">
  <a class="col-12" data-toggle="collapse" href="{{'#card-'.$card->id}}" role="button" aria-expanded="false"
  aria-controls="{{'card-'.$card->id}}">

      <div class="row align-items-center">
        <div class="col-3">
          <div  class="card-type">
            @if(strtolower($card->type) == 'visa')
              <i class="fab fa-cc-visa fa-2x" style="color: black;"></i>
              <span>{{' '.$card->type}}</span>
            @else
              <i class="fab fa-cc-mastercard fa-2x"  style="color: black;"></i>
              <span>{{' '.$card->type}}</span>
            @endif
          </div>
        </div>

        <div class="col-5">
          <span>
            {{'Ends with '.$card->card_number}}
          </span>
        </div>

        <div class="col-3">
          <span>
            {{$card->exp_date}}
          </span>
        </div>

        <div class="col-1">
          <i class="fas fa-sort-down" style="color: #333"></i>
        </div>

      </div>

    </a>


  <div class="collapse w-100" id="{{'card-'.$card->id}}" style="z-index:1">
      <div class="card card-body">

        <div class="row">

          <div class="col-4">
            <h6 class="card-text mb-2">Owner</h6>
          </div>

          <div class="col-4 offset-4 mb-2">
            <h6 class="card-text">Billing Address</h6>
          </div>

        </div>


        <div class="row">

          <div class="col-4">
           <span>{{$card->name.' '.$card->surname}}</span> 
          </div>

          <div class="col-4 offset-4 text-left">

            @if(isset($address_owner))
               <span>
              {{$address_owner->name.' '.$address_owner->surname}}
                  {{$billing_address->address.' '.$billing_address->address_additional.' '.$billing_address->city.', '.$billing_address->postal_code.' '.$billing_address->country}}
            </span>
            @else
              <span>You have not billing address</span> 
            @endif
            
          </div>

        </div>

        <div class="row mt-2">

          <div class="col-2 offset-8">
          <a href="#" class="card-link genric-btn danger radius small" data-id="{{ $card->id }}">Delete</a>
          </div>

          <div class="col-2">
          <a href="#" class="card-link genric-btn primary radius small" data-id="{{ $card->id }}">Modify</a>
          </div>
          
        </div>
        

      </div>
    </div>
  
  </div>
@endforeach
</div>

<div class="row col-12 justify-content-end">
  <a href="{{ route('card.create') }}" class="btn btn-success btn-save">Add</a>
  </div>