  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0"><span>KOPUM IATMI</span></h1>
      <p class="mb-4 pb-0">Indonesia's Leading Oil & Gas Training Provider</p>

        <a href="#about" class="about-btn scrollto">Explore all trainings</a>
      <div>
        <a href="#about" class="about-btn scrollto">This month trainings</a>
        <a href="#about" class="about-btn scrollto">Next month trainings</a>
      </div>
      
      
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <h2><a id="odometer1" class="odometer1">100</a><a>+</a></h2>
            <p>Trainings successful</p>
          </div>
          <div class="col-4">
            <h2><a id="odometer2" class="odometer1">50</a><a>+</a></h2>
            <p>Client companies</p>
          </div>
          <div class="col-4">
            <h2><a id="odometer3" class="odometer1">1000</a><a>+</a></h2>
            <p>Participants</p>
          </div>
        </div>
      </div>
    </section>

    <script>
    $('.odometer1').each(function () {
      var $this = $(this);
      jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
        duration: 2600,
        easing: 'swing',
        step: function () {
          $this.text(Math.ceil(this.Counter));
        }
      });
    });

    $('.odometer2').each(function () {
      var $this = $(this);
      jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
        duration: 2000,
        easing: 'swing',
        step: function () {
          $this.text(Math.ceil(this.Counter));
        }
      });
    });

    $('.odometer3').each(function () {
      var $this = $(this);
      jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
        duration: 3150,
        easing: 'swing',
        step: function () {
          $this.text(Math.ceil(this.Counter));
        }
      });
    });
    </script>

    <!--==========================
      Buy Ticket Section
    ============================-->
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>January 2020</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Technical Discussion</h5>
                <h6 class="card-price text-center">Subsurface & Surface Breakthrough Innovation to Support Massive Drilling Campaign</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>10 - 15 January 2020</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>P9, City Plaza, Jakarta</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Wahju Wibowo, SKK Migas</li>
                </ul>
                <hr>
                  <div class="text-left">
                    <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Register Now</button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">See Details</button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Download Proposal</button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Question? <i class="fab fa-whatsapp" style="color: #25d366"></i></button>
                  </div>
              </div>
            </div>
          </div>
        </div><br>

      </div>
    </section>

    <!--==========================
      Buy Ticket Section
    ============================-->
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>February 2020</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">IATMI Coffee Break</h5>
                <h6 class="card-price text-center">Well Work & Operation Innovation - A Case Study in Pertamina EP</h6>
                <hr>
                <ul class="fa-ul"><li><span class="fa-li"><i class="fa fa-check"></i></span>10 - 15 February 2020</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Funantique Kopi GBK, Jakarta</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Pertamina EP</li>
                </ul>
                <hr>
                <div class="text-left">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Register Now</button>
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">See Details</button>
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Download Proposal</button>
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Question? <i class="fab fa-whatsapp" style="color: #25d366"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div><br>

      </div>
    </section>



    <!--==========================
      Speakers Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Training Instructors</h2>
          <p>We have high qualified and experienced local and international instructors<br>from oil and gas experts which are the members of IATMI</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('assets/img/speakers/1.jpg'); ?>" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Brenden Legros</a></h3>
                <p>Quas alias incidunt</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('assets/img/speakers/2.jpg'); ?>" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Hubert Hirthe</a></h3>
                <p>Consequuntur odio aut</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('assets/img/speakers/3.jpg'); ?>" alt="Speaker 3" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Cole Emmerich</a></h3>
                <p>Fugiat laborum et</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('assets/img/speakers/4.jpg'); ?>" alt="Speaker 4" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Jack Christiansen</a></h3>
                <p>Debitis iure vero</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('assets/img/speakers/5.jpg'); ?>" alt="Speaker 5" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Alejandrin Littel</a></h3>
                <p>Qui molestiae natus</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('assets/img/speakers/6.jpg'); ?>" alt="Speaker 6" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Willow Trantow</a></h3>
                <p>Non autem dicta</p>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

    </section>

    <!--==========================
      Sponsors Section
    ============================-->
    <section id="supporters" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Clients</h2>
          <p>Almost all of the oil and gas companies in Indonesia have joined our trainings<br>and more than 1000 professionals have participated</p>
        </div>

        <div class="row no-gutters supporters-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/1.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/2.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/3.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/4.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/5.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/6.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/7.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="<?php echo base_url('assets/img/supporters/8.png'); ?>" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>

  <!--==========================
    doc Section
  ============================-->
  <section id="doc">
    <div class="doc-container wow fadeIn">
        <a href="#about" class="about-btn scrollto">Explore all trainings</a>
    </div>
  </section>



    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Subscribe to KOPUM IATMI</h2>
          <p>You will receive alerts for upcoming Oil & Gas trainings</p>
        </div>

        <form method="POST" action="#">

          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="col-auto">
              <input type="email" class="form-control" placeholder="Email">
            </div>
          </div>
          </br>
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Job title">
            </div>
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Institution/Company">
            </div>
          </div>
          </br>
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section>

  </main>
