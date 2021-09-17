@extends('layouts.home')
@section('title')
<title>Cart</title>
@endsection
@section('js')
<script>
$('.cart_quantity_update').click(function(e) {
  e.preventDefault();
  let urlUpdateCart = $('.update_cart_url').data('url');
  let id = $(this).data('id');
  let quantity = $(this).parents('tr').find('input').val();
  $.ajax({
    type: "GET",
    url: urlUpdateCart,
    data: {
      id: id,
      quantity: quantity
    },
    success: function(data) {
      if (data.code===200) {
        $('.wrapper').html(data.cart_component);
      }
    },
    error: function() {
      
    }
  });

});
</script>
@endsection
@section('content')
<div class="wrapper">
  @include('home.components.cart_components.cart_component')
</div>

<!--/#do_action-->
@endsection