@extends('layouts.user.main')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Halaman Detail Produk Flash Sale</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Detail Produk Flash Sale</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="section_gap">
    <!--================ Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ asset('images/' . $flash_sale->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $flash_sale->name }}</h3>
                        <h2>{{ $flash_sale->diskon_price }} Points</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Kategori</span> : {{ $flash_sale->category }}
                                </a>
                            </li>
                        </ul>
                        <p>{{ $flash_sale->description }}</p>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="javascript:void(0);"
                               onclick="confirmPurchaseSale('{{ $flash_sale->id }}', '{{ Auth::user()->id }}')">Beli Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Single Product Area =================-->
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmPurchaseSale(flash_saleId, userId) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan membeli produk ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Beli!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/flashsale/purchaseSale/' + flash_saleId + '/' + userId;
        }
    });
}
</script>
@endsection
