<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed update_cart_url" data-url="{{route('cart.update')}}">
        <thead>
          <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @php
          $total =0;
          @endphp
          @foreach($carts as $id => $cartItem)
          @php
          $total += $cartItem['price']*$cartItem['quantity'];
          @endphp
          <tr data-id="{{ $id }}">
            <td class="cart_product">
              <a href=""><img style="width:40%" src="{{$cartItem['image']}}" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{$cartItem['name']}}</a></h4>

            </td>
            <td style="width:20%" class="cart_price">
              <p>{{number_format($cartItem['price'])}} đ</p>
            </td>
            <td style="width:23%" class="cart_quantity">
              <div class="cart_quantity_button">

              <input type="number" style="width:100px" value="{{$cartItem['quantity']}}" class="form-control quantity update-cart" size="3" />

              </div>
            </td>
            <td style="width:25%" class="cart_total">
              <p class="cart_total_price">{{number_format($cartItem['price']*$cartItem['quantity'])}} đ</p>
            </td>
            <td style="margin-right:1px;display:flex" class="cart_delete">
              <!-- <a href="#" data-id="{{$id}}" class="cart_quantity_update"><i class="fa fa-edit"></i></a> -->
              <a class="cart_quantity_delete delete-cart"  data-id="{{$id}}" href=""><i class="fa fa-times"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
<!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next?</h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery
        cost.</p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="chose_area">
          <ul class="user_option">
            <li>
              <input type="checkbox">
              <label>Use Coupon Code</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Use Gift Voucher</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Estimate Shipping & Taxes</label>
            </li>
          </ul>
          <ul class="user_info">
            <li class="single_field">
              <label>Country:</label>
              <select>
                <option>United States</option>
                <option>Bangladesh</option>
                <option>UK</option>
                <option>India</option>
                <option>Pakistan</option>
                <option>Ucrane</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field">
              <label>Region / State:</label>
              <select>
                <option>Select</option>
                <option>Dhaka</option>
                <option>London</option>
                <option>Dillih</option>
                <option>Lahore</option>
                <option>Alaska</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field zip-field">
              <label>Zip Code:</label>
              <input type="text">
            </li>
          </ul>
          <a class="btn btn-default update" href="">Get Quotes</a>
          <a class="btn btn-default check_out" href="">Continue</a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="total_area">

          <ul>
            <li>Tổng tiền <span>{{number_format($total)}} đ</span></li>
            <li>Phí vận chuyển <span>{{number_format(30000)}} đ</span></li>
            <li>Số tiền phải trả <span>{{number_format($total+30000)}} đ</span></li>
          </ul>
          <a class="btn btn-default update" href="">Update</a>
          <a class="btn btn-default check_out" href="">Check Out</a>
        </div>
      </div>
    </div>
  </div>
</section>