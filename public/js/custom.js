$(document).ready(function(){
    "use strict";


    //----- Ours scripts --//




  var url = 'http://127.0.0.1:8000';

  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 6000
});

    // Disable scroll when focused on a number input.
    $('form').on('focus', 'input[type=number]', function(e) {
        $(this).on('wheel', function(e) {
            e.preventDefault();
        });
    });

    // Restore scroll on number inputs.
    $('form').on('blur', 'input[type=number]', function(e) {
        $(this).off('wheel');
    });

    // Disable up and down keys.
    $('form').on('keydown', 'input[type=number]', function(e) {
        if ( e.which == 38 || e.which == 40 )
            e.preventDefault();
    });



// ------------------- SHOPPING CART------------------------- //




  //------ ADD A PRODUCT TO SHOPPING CART -----//

  $('.view-btn.color-2.addCart,.carello').click(function(event){

    event.preventDefault();
    let product_id, quantity,size;

    product_id = $('input[name="product_id"]').val();
    quantity = $('#quantity').val();
    size = $('#size').val();

    if(!product_id && !quantity){
      product_id = $(this).data('id')
      quantity = 1
    }
    console.log(size);
    $.ajax({
      url: '/cart/add',
      type: 'POST',
      data: {
        product_id: product_id,
        quantity: quantity,
        size: size
      },
      success: function(data){
        if(data.message){
          Toast.fire({
            type: 'error',
            title: data.message
        });
        } else {
           Toast.fire({
          type: 'success',
          title: 'Product added to the cart'
      });
        }
       
      },
      error: function(data){
        console.log(data);
      }

    })

  });

     //--- Add all products to shopping cart ---//

  //    $('.add').click(function(event){

  //     event.preventDefault();
  //     let products = $('.cart-single-item') // Tutti i prodotti
  //     let ids = []                          // Gli ID dei prodotti

  //     $.each(products,function(){
  //        let children = $(this).find('.carello').data('id') // Prendo l'id del prodotto
  //        ids.push(children)                                               // Inserisco l'id del prodotto  nell'array
  //     })
  //     $.ajax({
  //       url: '/wishlist/add/all',
  //       type: 'POST',
  //       data: {
  //         products_id: ids
  //       },
  //       success: function(){
  //         $.ajax({
  //           url: '/wishlist/delete/all',
  //           type: 'POST',
  //           data: {
  //             products_id: ids
  //           },
  //           success: function(res){
  //             console.log(res)
  //             $.each(products,function(){
  //               let product = $(this)
  //               product.fadeOut("normal",function(){
  //                 product.remove()
  //               })
  //             })
  //           },
  //           error: function(err){
  //             console.log(err)
  //           }
  //         })
  //       },
  //       error: function(err){
  //         console.log(err)
  //       }
  //     })

  // })
  //------------------------- WISHLIST -------------------//


  //----- ADD WISHLIST ---//

    $('a.like-btn,a.wishlist').on("click",function(event){
      event.preventDefault()
      let product_id = $('input[name="product_id"]').val();

      if(!product_id){
        product_id = $(this).data('id')
      }
      $.ajax({
        url: '/wishlist',
        type: 'POST',
        data: {
         product_id: product_id,
        },
        success: function(){
          Toast.fire({
            type: 'success',
            title: 'Product added to the wishlist'
        });
        },
        error: function(data){
          console.log(data);
        }

      })

    })


  //------ DELETE PRODUCT FROM WISHLIST ------//

    $('.deleteProductWishList').click(function(event){

      event.preventDefault();

      let parent = $(this).parents('div.cart-single-item')
      let product_id = $(this).data('id')

      $.ajax({
        url: `/wishlist/delete/${product_id}`,
        type: 'GET',
        success: function(){
          parent.fadeOut("normal",function(){
            parent.remove()
          })
        }

      })
    })

  // ---- Delete all products from wishlist ----//

   $('.remove').click(function(event){

    var button = $(this);

    event.preventDefault();
    let products = $('.cart-single-item') // Tutti i prodotti
    let ids = []                          // Gli ID dei prodotti

    $.each(products,function(){
       let children = $(this).find('.deleteProductWishList').data('id') // Prendo l'id del prodotto
       ids.push(children)                                               // Inserisco l'id del prodotto  nell'array
    })
    $.ajax({
      url: '/wishlist/delete/all',
      type: 'POST',
      data: {
        products_id: ids
      },
      success: function(res){
        console.log(res)
        $.each(products,function(){
          let product = $(this)
          product.fadeOut("normal",function(){
            product.remove()
          })
        })
        button.remove();
      },
      error: function(err){
        console.log(err)
      }
    })
  })

  //------------- Stars -------------//

  var stars = $('#commento i')
  stars.css("cursor","pointer")
  var classe = 5
  stars.on("click",function(event){
    event.preventDefault()
    parent = stars.parent();
    classe = parseInt(this.className.slice(11).trim())
    switch(classe){

        case 1:
        parent.removeClass()
        parent.addClass('total-star one-star d-flex align-items-center')
        break

        case 2:
          parent.removeClass()
          parent.addClass('total-star two-star d-flex align-items-center')
          break
        case 3:
          parent.removeClass()
          parent.addClass('total-star three-star d-flex align-items-center')
          break
        case 4:
        parent.removeClass()
        parent.addClass('total-star four-star d-flex align-items-center')
          break
        case 5:
        parent.removeClass()
        parent.addClass('total-star five-star d-flex align-items-center')
          break
    }

    })

    //----- SEND REVIEW AJAX ----//

    $('#inviaCommento').on("click",function(event){
      event.preventDefault();
      let content = $('textarea[name="content"]').val()
      let product_id = $('input[name="product_id"]').val();

      $.ajax({
        url: '/comment',
        type: 'POST',
        data:{
          product_id: product_id,
          content: content,
          vote: classe
        },
        success: function(e){
          location.reload()
          
        },
        error: function(e){     
            Toast.fire({
              type: 'error',
              title: e.responseJSON.message
            })
        }
      })

  })

 /*------------- ADDRESSES --------------------*/

 $('.address_remove').click(function(event){
    event.preventDefault();
    let address_id = $(this).data('id');
    let parent = $(this).parents('div.address');
    $.ajax({
      type: "DELETE",
      url: `/address/${address_id}/delete`,
      success: function (response) {
        parent.fadeOut("normal",function(){
          parent.remove();
        });
      },
      error: function(e){
        console.log(e)
      }
    });
 });


 /*------------ CARDS ------------ */


 $('.card_remove').click(function(event){
   event.preventDefault();
   let card_id = $(this).data('id');
   let container = $(this).parents('div.user-card')

   $.ajax({
    type: "DELETE",
    url: `/card/${card_id}/delete`,
    success: function () {
      container.fadeOut("normal",function(){
        container.remove();
      });
    },
    error: function(e){
      console.log(e)
    }
  });
 })

 $('#addCardModalForm').on('submit',function(event){
  event.preventDefault()

  let card_number = $("input[name=card_number]").val();
  let exp_date = $("input[name=exp_date]").val();
  let type = $("select[name=type]").val();
  let cvv = $("input[name=cvv]").val();
  let name = $("input[name=name]").val();
  let surname = $("input[name=surname]").val();
  $.ajax({
    url: '/card/save',
    type: 'POST',
    data:{
      type: type,
      card_number: card_number,
      name: name,
      surname: surname,
      exp_date: exp_date ,
      cvv:  cvv,
      ajax: true
    },
    success: function(data){
      $('#addCardModal').modal('hide');
      $('#cards').append(
        `<option value="${data.id}" selected>${data.card_number}</option>`
      )
      Toast.fire({
        type: 'success',
        title: 'Card saved'
    });
    },
    error: function(e){
      Toast.fire({
        type: 'error',
        title: e.responseJSON.message
      })
    }
  })

 })

 $('.cart-to-checkout').change(function(){

  var quantity = $(this).val();
  var product_id = $(this).data('id');

  $.ajax({
    type: "POST",
    url: "/cart/refresh-quantity",
    data: {
      product_id: product_id,
      quantity: quantity,
    },
    success: function (e) {
      if(e.message){
        Toast.fire({
          type: 'error',
          title: e.message
      });
      }
      console.log('quantità aggiornata');
    },
    error: function(e){
      console.log(e);
    }
  });

 })

 $('.increase.arrow.cart').click(function(e){

  var product = $(this).parent().siblings('input');
  var quantity = parseInt($(product).val()) + 1;
  var product_id = $(product).data('id');
  console.log(quantity);

  $.ajax({
    type: "POST",
    url: "/cart/refresh-quantity",
    data: {
      product_id: product_id,
      quantity: quantity,
    },
    success: function (e) {
      if(e.message){
        Toast.fire({
          type: 'error',
          title: e.message
      });
      }
      console.log('quantità aggiornata');
    },
    error: function(e){
      console.log(e);
    }
  });

 })

 $('.decrease.arrow.cart').click(function(e){

  var product = $(this).parent().siblings('input');
  var quantity = parseInt($(product).val()) - 1;
  var product_id = $(product).data('id');

  console.log(quantity);
  
  $.ajax({
    type: "POST",
    url: "/cart/refresh-quantity",
    data: {
      product_id: product_id,
      quantity: quantity,
    },
    success: function (e) {
      if(e.message){
        Toast.fire({
          type: 'error',
          title: e.message
      });
      }
    },
    error: function(e){
      console.log(e);
    }
  });

 })

 $(document).on('click','.like-button',function(event){
   var comment_id = $(this).data('id');
   var like_button = $(this);

   $.ajax({
     type: "GET",
     url: "/comment/"+comment_id+"/like",
     success: function (e) {
      if(e.message){
        Toast.fire({
          type: 'error',
          title: e.message
      });
      } else{
          like_button.removeClass('like-button').addClass('dislike-button');
          like_button.parent().siblings('small').text(e.count);

      }
     },
     error: function(e){
       console.log(e);
     }
   });
 })

 $(document).on('click','.dislike-button',function(event){
  var comment_id = $(this).data('id');
  var like_button = $(this);
  $.ajax({
    type: "GET",
    url: "/comment/"+comment_id+"/dislike",
    success: function (e) {
      if(e.message){
        Toast.fire({
          type: 'error',
          title: e.message
      });
      }else{
              like_button.removeClass('dislike-button').addClass('like-button');
              like_button.parent().siblings('small').text(e.count);
            }
    },
    error: function(e){
      console.log(e);
    }
  });
})


    /* calcolaPrezzo();

    $('.lnr.lnr-chevron-up').click(function(event){
     calcolaPrezzo();
    })

    $('.lnr.lnr-chevron-down').unbind().click(function(event){
      calcolaPrezzo();
     })*/
})
