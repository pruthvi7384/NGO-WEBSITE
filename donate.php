<?php
    include 'components/Navigation.php';
?>
<!-- Donates Form -->
    <div class="container padding donation">
        <div class="heading">
            <h2>Donate To Our Ngo</h2>
            <p>Help to needed !</p>
        </div>
        <div class="form_body d-flex mt-2">
            <form>
                <div class="form-controal d-flex">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter Your Full Name" required>
                </div>
                <div class="form-controal d-flex">
                    <label for="">E-Mail Id</label>
                    <input type="text" id="email" placeholder="Enter Your Email Id" required>
                </div>
                <div class="form-controal d-flex">
                    <label for="">Phone Number</label>
                    <input type="number" id="phone_no" placeholder="Enter Your Phone Number" required>
                </div>
                <div class="form-controal d-flex">
                    <label for="">Donation Amount</label>
                    <input type="number" id="donation_amount" placeholder="Enter Donation Amount" required>
                </div>
                <div class="form-btn">
                    <button value="Pay Now" type="button"  class="btn read-more-btn" onClick="pay_now()">Donate Now</button>
                </div>
            </form>
        </div>
    </div>
<!--X- Donates Form -X-->

<!-- Actual donation Process -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function pay_now(){
            var name=jQuery('#name').val();
            var email=jQuery('#email').val();
            var phone=jQuery('#phone_no').val();
            var donation_amount=jQuery('#donation_amount').val();
            jQuery.ajax({
                type:'post',
                url:'payment_process.php',
                data:"name="+name+"&email="+email+"&donation_amount="+donation_amount+"&phone="+phone,
                success:function(result){
                    var options = {
                            "key": "Your ReserPay Api Key", 
                            "amount": donation_amount*100, 
                            "currency": "INR",
                            "name": "NGO DONATION",
                            "description": "Help To Needed",
                            "image": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-rLQbzzDvyIqh9k8peFVDyski_OKL38fYsg&usqp=CAU",
                            "handler": function (response){
                            jQuery.ajax({
                                type:'post',
                                url:'payment_process.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="thank_you.php?id="+response.razorpay_payment_id;
                                }
                            });
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function (response){
                            alert(response.error.reason);
                        });
                        rzp1.open();
                }
            });
        }
    </script>

<!--X- Actual donation Process -X-->
<?php 
    include 'components/footer.php'
?>
