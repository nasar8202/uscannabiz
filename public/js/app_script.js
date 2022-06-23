$(()=>{

    
    $(document).on('click', ".add_to_wishlist", function(){
        let el = $(this);
        $.post(base_url + '/shop/add-wishlist', {
            "product_id": el.data('product'),
            "customer_id": el.data('customer'),
            "_token": $("meta[name=csrf-token]").attr('content')
        }, function(d){
            if(d.status){
                el.addClass('wishlist-added');
                el.addClass('remove_to_wishlist');
                el.removeClass('add_to_wishlist');
                el.attr('data-wishlist', d.data.id);
                toastr.success('Whishlist Added Successfully!', 'Success!')
            } else {
                toastr.error(d.message, 'Error!')
            }
        })
    })

    $(document).on('click', ".remove_to_wishlist", function(){
        let el = $(this);
        $.post(base_url + '/shop/add-wishlist', {
            "product_id": el.data('product'),
            "customer_id": el.data('customer'),
            "_token": $("meta[name=csrf-token]").attr('content'),
            "remove": 1,
            "wishlist_id": el.attr('data-wishlist')
        }, function(d){
            if(d.status){
                el.removeClass('remove_to_wishlist');
                el.removeClass('wishlist-added');
                el.addClass('add_to_wishlist')
                toastr.success(d.message, 'Success!')
            } else {
                toastr.error(d.message, 'Error!')
            }
        })
    })
})