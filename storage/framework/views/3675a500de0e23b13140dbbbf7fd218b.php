<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Daily Offer</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Daily Offer</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.consultation.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Product</label>
                        <select name="product" class="form-control" id="product_search">
                            <option value="">Select</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
	
	
	
	<div class="container mt-5">
    <h1 class="text-center mb-4">Book Your Free Consultation</h1>
    <p class="text-center">3D Cakes are currently Scotland's most awarded cake boutique.</p>
    <p class="text-center">Fill out your details below to book a free consultation and cake tasting with our award-winning team.</p>
    <p class="text-center">Personal Design Service: Our skilled team will help take you through the process to create a design tailored to your requirements.</p>
    <p class="text-center">Full details on our ordering process and terms & conditions of booking can be viewed <a href="#">here</a>.</p>

    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="firstName" required>
            </div>
            <div class="form-group col-md-6">
                <label for="surname">Surname <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="surname" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" id="phone" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="eventDate">Event Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="eventDate" required>
            </div>
            <div class="form-group col-md-6">
                <label for="venue">Venue</label>
                <input type="text" class="form-control" id="venue">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="numberGuests">Number of Guests</label>
                <select id="numberGuests" class="form-control">
                    <option>0-35</option>
                    <option>36-70</option>
                    <option>71-100</option>
                    <option>101-150</option>
                    <option>150+</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="otherInfo">Any other information</label>
                <input type="text" class="form-control" id="otherInfo">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cakeBudget">Cake Budget <span class="text-danger">*</span></label>
                <select id="cakeBudget" class="form-control" required>
                    <option>Under £50</option>
                    <option>£50-£100</option>
                    <option>£100-£150</option>
                    <option>£150-£200</option>
                    <option>£200+</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="consultationStore">Select Consultation Store <span class="text-danger">*</span></label>
                <select id="consultationStore" class="form-control" required>
                    <option>Edinburgh Store: Open (20 Roseburn Terr)</option>
                    <option>Milngavie Store</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="consultationType">Consultation Type (in-store, telephone or zoom) <span class="text-danger">*</span></label>
                <select id="consultationType" class="form-control" required>
                    <option>In-store</option>
                    <option>Telephone</option>
                    <option>Zoom</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="existingOrder">Is this for an existing booking or new order? <span class="text-danger">*</span></label>
                <select id="existingOrder" class="form-control" required>
                    <option>New Order</option>
                    <option>Existing Booking</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="cakeType">Type of cake required <span class="text-danger">*</span></label>
                <select id="cakeType" class="form-control" required>
                    <option>Wedding Cake</option>
                    <option>Birthday Cake</option>
                    <option>Corporate Cake</option>
                    <option>Other Occasion</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="bookingStatus">If you have an existing booking with us, please select whether you are looking to discuss/change aspects of your cake design, or whether you would like to come in for a cake tasting only</label>
                <select id="bookingStatus" class="form-control">
                    <option>Not applicable, my booking is new</option>
                    <option>Discuss/Change Design</option>
                    <option>Cake Tasting Only</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="consultationDate">Consultation Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="consultationDate" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="consultationTime">Consultation Time <span class="text-danger">*</span></label>
                <select id="consultationTime" class="form-control" required>
                    <option>10am-10:45am</option>
                    <option>11am-11:45am</option>
                    <option>12pm-12:45pm</option>
                    <option>1pm-1:45pm</option>
                    <option>2pm-2:45pm</option>
                    <option>3pm-3:45pm</option>
                    <option>4pm-4:45pm</option>
                    <option>5pm-5:45pm</option>
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#product_search').select2({
                ajax: {
                    url: '<?php echo e(route("admin.daily-offer.search-product")); ?>',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function(data){
                        return {
                            results: $.map(data, function(product){
                                return {
                                    text: product.name,
                                    id:product.id,
                                    image_url: product.thumb_image
                                }
                            })
                        }
                    }
                },
                minimumInputLength: 3,
                templateResult: formatProduct,
                escapeMarkup: function(m) {return m;}

            });

            function formatProduct (product){
                var product = $('<span><img src="'+product.image_url+'" class="img-thumbnail" width="50" >  '+product.text+'</span>');
                return product;
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/consultation/create.blade.php ENDPATH**/ ?>