<h3 class="text-center mt-20 mb-50">My Adresses</h3>

<div class=" addresses ">

    <div class="row justify-content-around mb-50">

        @foreach($addresses as $address)
        <div class="address col-3 mb-25">
            <div class="h-100 p-3">

                <div class="h-90">
                    <i class="fas fa-map-marker-alt fa-2x" style="color:#f41068"></i>
                    <ul class="addres_info">
                        <li class="p-1">
                            {{ $address->user->name.' '.$address->user->surname }}
                        </li>
                        <li class="p-1">
                            {{ $address->address }}
                        </li>
                        <li class="p-1">
                            {{ $address->address_additional }}
                        </li>
                        <li class="p-1">
                            {{ $address->city.', '.$address->postal_code }}
                        </li>
                        <li class="p-1">
                            {{ $address->country }}
                        </li>
                        <li class="p-1">
                            {{ $address->type }}
                        </li>
                    </ul>
                </div>

                <div class="h-auto">

                    <span>
                        <a href="{{ route('address.edit',['id' => $address->id]) }}">Modify</a>
                    </span>
                    &nbsp; | &nbsp;
                    <span>
                        <a class="address_remove" data-id="{{ $address->id }}" href="#">
                            Remove
                        </a>
                    </span>

                </div>

            </div>
        </div>
        @endforeach

        @if($addresses->isEmpty())

        <div class="card col-6 text-center p-0">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    You haven't added any addresses yet.</h5>
                <p class="card-text">Click below to add an address</p>
                <a href="{{ route('address.create') }}" class="genric-btn primary circle arrow">
                    Add
                    <span class="lnr lnr-arrow-right"></span>
                </a>
            </div>
            <div class="card-footer custom">
                Shop
            </div>
        </div>

        @else
        <div class="row col-12 justify-content-end">
        <a href="{{ route('address.create') }}" class="btn btn-success btn-save">Add</a>
        </div>
        @endif
    </div>
</div>
