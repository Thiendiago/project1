

$(document).ready(function () {
    $('.num-order').change(function () {
        var id = $(this).data('id');
        var qty = $(this).val();
//        $("#header-qty").text(qty);
        var data = {id: id, qty: qty};
		console.log(data);
        $.ajax({
            url: '?mod=cart&controller=index&action=process',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                $("#sub-total-" + id).text(data.sub_total);
                $("#total-price-products").text(data.total);
                $("#num").text(data.num_order);
                $("#num-respon").text(data.num_order);
                
//                phần header
                $("#header-num").text(data.num_order);
                $("#header-qty-" + id).text(data.qty);
                $("#header-total").text(data.total);
                console.log(data);
            }
        });
    });
});