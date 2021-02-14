<!-- Contact Form -->
<div class="row">
  <div class="col-md-8 offset-md-2">

    <form id="contact-form" method="post">

      <div class="row">
        <div class="col-md-6">
          <label for="first-name">First Name</label>
          <input type="text" class="form-control first-name" placeholder="First name" aria-label="First name">
        </div>

        <div class="col-md-6">
          <label for="last-name">Last Name</label>
          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
      </div>

      <div class="mb-3">
        <label for="name">Email</label>
        <input class="form-control" id="field-email" type="text" placeholder="Enter your email" />
        <small id="email-help" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div><!-- ./input-group -->

      <div class="mb-3">
        <label for="field-phone">Phone</label>
        <input class="form-control field-phone" type="text" />
      </div><!-- ./input-group -->

      <div class="mb-3">
        <label for="field-message">Message</label>
        <textarea class="form-control field-message"></textarea>
      </div><!-- ./input-group -->

      <div class="mb-3">
        <input class="btn btn-success" type="submit" value="Send" />
      </div><!-- ./input-group -->

    </form>

  </div><!-- ./col -->
</div><!-- ./row -->
