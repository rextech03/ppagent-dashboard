import PaystackPop from '@paystack/inline-js';

function paystackPay() {
    var amount = document.getElementById("amount").value * 100;
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    // var phone = document.getElementById("phone").value;
    var room_id = document.getElementById("room_id").value;

    let handler = PaystackPop.setup({
        key: 'pk_test_aeb239c1402332dc262d56d7b1fab1d3b3450249',
        amount: amount,
        email: email,
        ref: '' + Math.floor((Math.random() * 1000000000) +
            1),
        onClose: function() {
            alert('Window closed.');
        },
        callback: function(response) {
            let reference = response.reference;
            console.log(reference);
            // verify payment
            $.ajax({
                type: "GET",
                url: "{{ URL::to('payment-verification') }}",
                data: {
                    name: name,
                    email:email,
                    // phone:phone,
                    room_id: room_id,
                    reference:reference
                },
                success: function(response) {
                    console.log(response['status']);
                    if (response['status'] == true) {
                        Swal.fire({
                            title: 'Payment Successfully done',
                            text: response['message'],
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Payment Failed',
                            text: 'Failed to verify payment',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            })
        }
    });
    handler.openIframe();
}
