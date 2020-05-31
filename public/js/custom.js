$(document).ready(function(){
    "use strict";


    //----- Ours scripts --//



  var url = 'http://127.0.0.1:8000';


// ------------------- SHOPPING CART------------------------- //




  //------ ADD A PRODUCT TO SHOPPING CART -----//

  $('.view-btn.color-2.addCart,.carello').click(function(event){

    event.preventDefault();
    let product_id, quantity;

    product_id = $('input[name="product_id"]').val();
    quantity = $('#quantity').val();

    if(!product_id && !quantity){
      product_id = $(this).data('id')
      quantity = 1
    }


    $.ajax({
      url: '/cart',
      type: 'POST',
      contentType: 'application/json',
      data: {
       product_id: product_id,
        quantity: quantity
      },
      success: function(){
        alert('Prodotto aggiunto al carello')
      },
      error: function(data){
        console.log(data);
      }
      
    })
    
  });

     //--- Add all products to shopping cart ---//

     $('.add').click(function(event){

      event.preventDefault();
      let products = $('.cart-single-item') // Tutti i prodotti
      let ids = []                          // Gli ID dei prodotti
  
      $.each(products,function(){
         let children = $(this).find('.carello').data('id') // Prendo l'id del prodotto 
         ids.push(children)                                               // Inserisco l'id del prodotto  nell'array
      })
      $.ajax({
        url: '/wishlist/add/all',
        type: 'POST',
        data: {
          products_id: ids
        },
        success: function(){
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
            },
            error: function(err){
              console.log(err)
            }
          })
        },
        error: function(err){
          console.log(err)
        }
      })
  
  })
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
          alert('Prodotto aggiunto alla wishlist')
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
          console.log(e)
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



    /* calcolaPrezzo();

    $('.lnr.lnr-chevron-up').click(function(event){
     calcolaPrezzo();
    })

    $('.lnr.lnr-chevron-down').unbind().click(function(event){
      calcolaPrezzo();
     })*/
})