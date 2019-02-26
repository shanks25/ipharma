@include('Theme::header')


<div role="main" class="main">
    @include('Theme::ajax_search')
    <div class="section-contact-area" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="heading-text-color">Leave a <strong>Message</strong></h2>
                    <form id="contactForm" action="#" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                                </div>

                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                                </div>

                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group mb-lg">
                                    <label>Message *</label>
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control" name="message" id="message" required></textarea>
                                </div>

                                <input type="submit" value="Send Message" class="btn btn-primary mb-xlg" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <h2 class="heading-text-color">Contact <strong>Details</strong></h2>
                    <ul class="list-unstyled list-contact">
                        <li>
                            <i class="fa fa-phone"></i> 
                            <div>0201 203 2032</div>
                            <div>0201 203 2032</div>
                        </li>
                        <li>
                            <i class="fa fa-mobile"></i> 
                            <div>201-123-3922</div>
                            <div>302-123-3928</div>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i> 
                            <div>Ipharma@gmail.com</div>
                            <div>Ipharma@Ipharma24.com</div>
                        </li>
                        <li>
                            <i class="fa fa-skype"></i> 
                            <div>Ipharma_skype</div>
                            <div>Ipharma</div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>


@include('Theme::footer')

</body>
</html>
