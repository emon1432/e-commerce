@extends('main.index')
@section('mainBody')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/wishlist_styles.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}"> --}}
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="cart-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading mb-10 lg">
                        <h3>My wishlist</h3>
                    </div>
                    <hr>
                    <div class="table-wishlist">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="15%">Image</th>
                                    <th width="40%">Product Name</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="15%">Stock Status</th>
                                    <th width="15%"></th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist_items as $data)
                                    <tr>
                                        <td width="15%">
                                            <div class="img-product">
                                                <img src="{{ URL::to($data->image_one) }}" alt="" height="100px;">
                                            </div>
                                        </td>
                                        <td width="40%" class="text-center">
                                            <div class="display-flex align-center">
                                                <div class="name-product">
                                                    {{ $data->product_name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td width="15%" class="price text-center">
                                            ${{ $data->discount_price == null ? $data->selling_price : $data->discount_price }}
                                        </td>
                                        <td width="15%" class="text-center"><span
                                                class="{{ $data->status == 1 ? 'in-stock-box' : 'in-out-of-stock-box' }}">{{ $data->status == 1 ? 'In Stock' : 'Out of Stock' }}</span>
                                        </td>
                                        <td width="15%"><button class="round-black-btn small-btn text-center">Add to
                                                Cart</button></td>
                                        <td width="10%" class="text-center">
                                            <a href="#" type="submit" class="trash-icon remove_wishlist">
                                                <input type="hidden" value="{{$data->id}}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
