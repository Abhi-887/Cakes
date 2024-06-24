@extends('frontend.layouts.master')

@section('content')

<style>
.form-control {
  -webkit-appearance: button;
  -moz-appearance: button;
}
</style>
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>We're Hiring</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">We're Hiring</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->
    <!--=============================
       WE'RE HIRING! PAGE START
    ==============================-->

    <div class="container mt-5">
        <h1 class="text-center">WE'RE HIRING!</h1>
        <p>To apply to join the team at 3D Cakes Edinburgh or 3D Cakes Milngavie, please complete the application form below and hit the 'Submit Application' button. Please ensure that you select the job reference(s) for all positions for which you wish to be considered (you may apply for more than one role).</p>

        <h3>Current vacancies are displayed below:</h3>
        <div class="card mb-3">
          <div class="card-body">
            <h4>Part Time Front-of-House Assistant (Edinburgh) Wednesday - Friday</h4>
            <p><strong>Main Duties:</strong> Front-of-house customer service for coffees & cake slices, baking and cake decorating (ideal candidate will have an enjoyment for baking and cake decorating). Have barista training skills. Have knowledge of Food Handling and Food Hygiene requirements. Be able to maintain a calm demeanour in busy periods, and provide a consistently high standard of customer service.</p>
            <p><strong>Working Hours & Wage:</strong> Wednesday - Friday 8.30am - 5pm, Job Type: Part-Time, £10.50 per hour | Job Reference: EDIN10</p>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-body">
            <h4>Full Time Delivery Driver</h4>
            <p><strong>Main Duties:</strong> Main duties will include delivery of cakes to customers in various locations throughout Scotland. Van provided during working hours and business is covered for company van. Previous experience in a delivery driver role. Decant and stack reliable (for gas/trolly and methodical). Be flexible as working days will vary per week depending on delivery requirements each week.</p>
            <p><strong>Other Information:</strong> Suitable candidates will have held a flat, clean UK driving license for a minimum of three years. For insurance purposes, our policy requires drivers to be 25 or older.</p>
            <p><strong>Working Hours & Wage:</strong> 5 days per week (25-40 hours per week); Rota Basis, £12 per hour | Job Reference: DRIV4</p>
          </div>
        </div>

        <form>
          <div class="form-group">
            <label for="jobReference">Please select the Job Reference(s) for which you would like to apply:</label>
            <select class="form-control" id="jobReference" name="job_reference" multiple>
              <option value="EDIN10">EDIN10: Part Time Front-of-House Assistant (Wed - Fri)</option>
              <option value="DRIV4">DRIV4: Full Time Delivery Driver</option>
            </select>
          </div>

          <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>

          <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="telephone">Telephone Number *</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" required>
          </div>

          <div class="form-group">
            <label for="drivingLicense">Do you hold a valid UK driving license? *</label>
            <select class="form-control" id="drivingLicense" name="driving_license" required>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>

          <div class="form-group">
            <label for="whyIdeal">Please detail why you think you would be ideal for the role(s): *</label>
            <textarea class="form-control" id="whyIdeal" name="why_ideal" rows="3" required></textarea>
          </div>

          <div class="form-group">
            <label for="relevantExperience">Please detail any relevant experience that you feel would be beneficial for the role(s): *</label>
            <textarea class="form-control" id="relevantExperience" name="relevant_experience" rows="3" required></textarea>
          </div>

          <div class="form-group">
            <label for="currentPosition">Length of time in current position *</label>
            <input type="text" class="form-control" id="currentPosition" name="current_position_duration" required>
          </div>

          <div class="form-group">
            <label for="portfolio">Examples of Your Work</label>
            <input type="file" class="form-control-file" id="portfolio" name="portfolio" accept=".pdf, .bmp, .jpeg, .png">
          </div>

          <div class="form-group">
            <label for="cv">Please attach your CV *</label>
            <input type="file" class="form-control-file" id="cv" name="cv" accept=".pdf, .bmp, .jpeg, .png" required>
          </div>

          <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
      </div>




    <!--=============================
         Application PAGE END
    ==============================-->
@endsection
