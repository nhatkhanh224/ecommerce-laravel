@extends('layouts.home')
@section('content')
@section('css')
<style>
.star-input {
  display: none;
}

.star {
  color: gold;

}

.star-input:checked+.star~.star {
  color: white;

}
</style>
@endsection
@section('js')
<script>
const commentButton = document.querySelector('.comment_button');
document.getElementById("product_id").value = commentButton.dataset.id;
</script>
@endsection
<div class="cart__app">
  <div class="grid wide">

    <div class="cart__app-body">
      <div class="cart__app-body--inner">
        <div class="cart__style-product">
          <h4>Chi tiết đơn hàng</h4>
          <div class="style__product-heading">
            <div class="product__heading-row">
              <div class="col-1">
                <label for="" class="product__checkbox">
                  <!-- <input type="checkbox" id="" class="checkbox__input">
                                            <span class="heading__checkbox-fake"></span> -->
                  <span class="label">Sản phẩm</span>
                </label>
              </div>
              <div class="col-1">Giá</div>
              <div class="col-1">Số lượng</div>


            </div>
          </div>
          <div class="style__product-body">
            <div>
              <div class="product__body-component">
                <div class="body__component-seller">
                  <div class="component__seller-body">
                    <div>
                      <div class="seller__body-item">
                        @foreach ($order as $order)
                        <div class="body__item-row">
                          <div class="col-1">
                            <span class="item__row-currentprice"><a href="">{{$order->product_name}}</a></span>
                            <span data-toggle="modal" data-target="#exampleModal" data-id="{{$order->product_id}}"
                              class="item__row-currentprice comment_button">Viết nhận xét</span>
                          </div>
                          <div class="col-1">
                            <span class="item__row-currentprice">{{number_format($order->price)}} đ</span>

                          </div>
                          <div class="col-1">
                            <span class="item__row-currentprice">{{$order->quantity}}</span>
                          </div>


                        </div>
                        @endforeach


                      </div>
                    </div>

                  </div>

                </div>

              </div>


            </div>
          </div>
          <div class="container">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IPHONE 13</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('comment')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <h2>Vui lòng đánh giá</h2>
                      <input type="radio" class="star-input" name="rating" id="star-1" value="1">
                      <label for="star-1" class="star"><i class="fas fa-star"></i></label>
                      <input type="radio" class="star-input" name="rating" id="star-2" value="2">
                      <label for="star-2" class="star"><i class="fas fa-star"></i></label>
                      <input type="radio" class="star-input" name="rating" id="star-3" value="3">
                      <label for="star-3" class="star"><i class="fas fa-star"></i></label>
                      <input type="radio" class="star-input" name="rating" id="star-4" value="4">
                      <label for="star-4" class="star"><i class="fas fa-star"></i></label>
                      <input type="radio" class="star-input" name="rating" id="star-5" value="5" checked>
                      <label for="star-5" class="star"><i class="fas fa-star"></i></label>
                      <input type="hidden" name="product_id" id="product_id">
                      <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                          placeholder="Chia sẻ thêm về sản phẩm" name="content"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Thêm ảnh</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_path[]" multiple>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                      <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
    </div>
  </div>

</div>
</div>
</div>

@endsection