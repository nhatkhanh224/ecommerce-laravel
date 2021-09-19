@extends('layouts.home')
@section('title')
<title>Cart</title>
@endsection
@section('js')
<script>
// function updateCart(e) {
//   e.preventDefault();
//   let urlUpdateCart = $('.update_cart_url').data('url');
//   let id = $(this).data('id');
//   let quantity = $(this).parents('tr').find('input').val();
//   $.ajax({
//     type: "GET",
//     url: urlUpdateCart,
//     data: {
//       id: id,
//       quantity: quantity
//     },
//     success: function(data) {
//       if (data.code === 200) {
//         $('.wrapper').html(data.cart_component);
//         alert('Cập nhật thành công');
//       }
//     },
//     error: function() {

//     }

//   });
// }

function cartUpdate(e) {
  e.preventDefault();
  var ele = $(this);
  $.ajax({
    url: '{{ route('cart.update')}}',
    method: "get",
    data: {
      id: ele.parents("tr").attr("data-id"),
      quantity: ele.parents("tr").find(".quantity").val()
    },
    success: function(data) {
      if (data.code === 200) {
        console.log(1);
        $('.wrapper').html(data.cart_component);
      }
    },
  });
}
function cartDelete(e) {
  e.preventDefault();
  var ele = $(this);
  let id = ele.data("id");
  $.ajax({
    url: '{{ route('cart.delete')}}',
    method: "get",
    data: {
      id: id,
    },
    success: function(data) {
      if (data.code === 200) {
        $('.wrapper').html(data.cart_component);
        alert('Cập nhật thành công');
      }
    },
  });
}
$(function() {
  $(document).on("change", '.update-cart', cartUpdate);
  $(document).on("click", '.delete-cart', cartDelete);
})
</script>
@endsection
@section('content')
<div class="wrapper">
  @include('home.components.cart_components.cart_component')
</div>

<!--/#do_action-->
@endsection