<div>
    <form class="positioned" name="sentMessage" id="contactForm" action="php/contact.php" method="post">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <input name="senderName" id="senderName" placeholder="Your Name" required type="text">
            </div>
            <div class="col-md-6 col-sm-6">
                <input name="senderEmail" id="senderEmail" placeholder="Email Address" required type="email">
            </div>
        </div>

        <input name="address" id="address" placeholder="Address" required type="text">

        <input placeholder="Zip Code" required type="number">

        <input placeholder="Mobile No." required type="number">


        <button type="submit" class="btn btn-primary btn-ico">Send Message<i class="fa fa-paper-plane-o"></i></button>
    </form>
</div>