var __products = [];
var __owner = [];
var __productQuantity = [];

function addToCart(data){
    var ownerId = document.querySelector('#addTocart').dataset.ownerId;
    __products.push(data);
    __owner.push(ownerId);
    //console.log(__products);

var productHtml = '';

var productContainer = document.getElementById('productContainer');

  for(var x = 0 ; x < __products.length ; x++){
      
    productHtml += ` 
    <div class="row" id="singleProduct" style="padding:10px" data-product="${__products[x].id}">
        <div class="col-12 col-sm-12 col-md-2 text-center">
            <img class="img-responsive" src="http://localhost:8000/images/${__products[x].image}" alt="prewiew" width="120" height="80">        
        </div>
        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-4">
            <h4 class="product-name"><strong>${__products[x].make}</strong></h4>
            <h4>
                <small>${__products[x].model}</small>
            </h4>
        </div>
        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                <h6><strong id="singleProductPrice">${__products[x].price} </strong></h6>
            </div>
            <div class="col-4 col-sm-4 col-md-4">
                <div class="quantity">
                    <input type="number" name="quantity${__products[x].id}" id="quantity${__products[x].id}"   step="1" max="99" min="1" value="1" title="Qty" class="qty" size="6">
                </div>
            </div>
            <div class="col-2 col-sm-2 col-md-2 text-right">
                <button id="remove" type="button" data-product-id="${__products[x].id}" onclick="removeProduct(event)" class="btn btn-outline-danger btn-xs">
                    Remove
                </button>
            </div>
        </div>
    </div>
    `;

    }
    productContainer.innerHTML = productHtml;

    calcTotal();
  }

  function calcTotal(){


    var priceContainer = [];
    var totalHtml = document.getElementById('totalPrice');

    for(var x = 0 ; x < __products.length ; x++){
      priceContainer.push(__products[x].price  );
  }



  const totalPrice = (accumulator, currentValue) => accumulator + currentValue;

  if(priceContainer.length >= 1 ){
      totalHtml.innerHTML = priceContainer.reduce(totalPrice);
  }else if(priceContainer.length = 1){
      const totalPrice = (accumulator, currentValue) => accumulator - currentValue;
      totalHtml.innerHTML = priceContainer.reduce(totalPrice , 0);
  }
  
  
}



function removeProduct(event){
  var event = event.target;
  var removeBtn = event.getAttribute('data-product-id');
  var removedProduct = document.getElementById('singleProduct');
  removedProduct.parentNode.removeChild(removedProduct);
  // var singleProductPrice = document.getElementById('singleProductPrice')
  __products.shift();
  calcTotal();
}



function submitData(event){
    event.preventDefault();
    var URL_ROOT = "http://localhost:8000/";
    $.post(URL_ROOT + '/save_data/', {
                '_token': $('meta[name=csrf-token]').attr('content'),
                '__products': __products,
                '__owner': __owner[0],
            }
            )
            .done(function(data) {
               console.log(data);
            })
            .fail(function(error) {
                console.log(error);
            });
  }