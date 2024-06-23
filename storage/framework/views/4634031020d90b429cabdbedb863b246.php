<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .razorpay-payment-button {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        $grandTotal = session()->get('grand_total');
        $payableAmount = ($grandTotal * config('gatewaySettings.razorpay_rate')) * 100
    ?>
    <form action="<?php echo e(route('razorpay.payment')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo e(config('gatewaySettings.razorpay_api_key')); ?>"
            data-currency="<?php echo e(config('gatewaySettings.razorpay_currency')); ?>"
            data-amount="<?php echo e($payableAmount); ?>"
            data-buttontext="Pay"
            data-name="Payment"
            data-descritpion="Payment for product"
            data-prefill.name="Jhon"
            data-prefill.email="test@gmail.com"
            data-theme.color="#ff7529"
        ></script>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            var button = document.querySelector(".razorpay-payment-button");
            button.click();
        })
    </script>
</body>
</html>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/razorpay-redirect.blade.php ENDPATH**/ ?>