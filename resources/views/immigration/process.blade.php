@extends('header')
@section('add-leads')
<style>
.client-agreement-heading {
    background-color: #f4f1fc;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 20px;
    border-top-left-radius: 9px;
    border-top-right-radius: 9px;
    font-size: 16px;
    color: #7744ff;
  }
  .client-agreement-heading span {
    background-color: #e6def8;
    border-radius: 5px;
    padding: 5px;
    transition: 0.5s;
    cursor: pointer;
  }
  .client-agreement-heading span:hover {
    background-color: #7744ff;
    color: white;
  }
  .form-label {
    margin-bottom: -15px;
    margin-left: 14px;
    background: white;
    padding: 5px;
    font-size: 12px;
  }
  .form-control {
    padding: 0.8rem;
    font-size: 14px;
  }
  .form-control:focus {
    background-color: #fff;
    border-color: #f4f1fc;
    outline: 0;
    box-shadow: 0 0 0 0.25rem #f4f1fc40 !important;
  }
  .form-select:focus {
    background-color: #fff;
    border-color: #f4f1fc;
    outline: 0;
    box-shadow: 0 0 0 0.25rem #f4f1fc40 !important;
  }
  .form-select {
    padding: 0.8rem;
    font-size: 14px;
  }
  .form-label b {
    color: red;
  }
  
  .form-check {
    font-size: 14px;
  }
  
  .form-check-input:checked {
    background-color: #7744ff;
    border-color: #f4f1fc40;
    box-shadow: none !important;
  }
  .form-check-label {
    font-size: 12px;
  }
  .table {
    font-size: 12px;
  }
  .btnn:hover {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
  }
  .progress-item-box {
    display: flex;
    padding: 1rem 0;
    /* flex-wrap: wrap; */
    scroll-snap-type: x mandatory;
    overflow: auto;
    scroll-padding: 1.5rem;
  }
  .progress-item {
    display: flex;
    gap: 5px;
    justify-content: start;
    align-items: center;
    color: #b8b8b8;
    position: relative;
    text-decoration: none;
    --right-space: 20px;
    padding-right: var(--right-space);
    flex: 0 0 auto;
    scroll-snap-align: start;
  }
  /* .progress-item::after{
              content: '';
              --line-width: 20px;
              position: absolute;
              right: calc((var(--right-space) - var(--line-width))/2);
              height: 2px;
              width: var(--line-width);
              background-color: #b8b8b8;
          } */
  .progress-item i {
    padding: 15px;
    border-radius: 5px;
    width: 8px;
    height: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #777;
    background-color: #f1edfc;
  }
  .progress-item span {
    color: #777;
    font-weight: 500;
  }
  /* .progress-item-box .progress-item:last-child{
      --right-space: 0;
  }
  .progress-item-box .progress-item:last-child::after{
      display: none;
  } */
  .progress-item.active i {
    color: #fff;
    background-color: #7744ff;
  }
  .progress-item.active span {
    color: #111;
    font-weight: bold;
  }
  
  /* ----------- */
  .acc-btn {
    color: #7744ff !important;
    font-weight: bold;
    width: 100%;
    padding: 1rem 2rem;
    background-color: #fff !important;
    text-decoration: none !important;
  }
  .acc-btn:focus {
    box-shadow: none !important;
    background-color: #fff !important;
    border-bottom: 0 !important;
  }
  .acc-btn:not(.collapsed) {
    color: #7744ff;
    background-color: #fff;
    box-shadow: none;
  }
  .acc-btn::after {
    display: none; /* Hide the default Bootstrap arrow */
  }
  .accordion-icon {
    font-size: 1.2rem; /* Adjust size as needed */
    transition: transform 0.2s ease;
    margin-left: auto;
    background-color: #e6def8;
    border-radius: 5px;
    padding: 5px;
    transition: 0.5s;
    cursor: pointer;
    height: 1rem;
    width: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
  }
  /* .acc-btn.collapsed .accordion-icon {
          transform: rotate(45deg); 
          } */
  .acc-btn:not(.collapsed) .accordion-icon {
    opacity: 0;
    transition: 0.3s;
  }
  /* Adjusting to better fit the icon placement */
  .acc-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  #services .services-top {
    padding: 70px 0 50px;
  }
  /* #services .services-list {
              padding-top: 50px;
          } */
  .services-list .service-block {
    margin-bottom: 25px;
  }
  .services-list .service-block .ico {
    font-size: 25px;
    float: left;
  }
  .services-list .service-block .text-block {
    margin-left: 38px;
  }
  .services-list .service-block .text-block .name {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;
  }
  .services-list .service-block .text-block .info {
    font-size: 13px;
    font-weight: 500;
    color: #b8b8b8;
    /* margin-bottom: 10px; */
  }
  .services-list .service-block .text-block .text {
    font-size: 12px;
    line-height: normal;
    font-weight: 300;
  }
  .highlight {
    color: #9d88cb;
    /* font-weight:bold; */
  }
  
  .sec-heading {
    font-size: 1rem;
    font-weight: bold;
    /* margin-left: -1rem; */
    margin-top: 1rem;
    position: relative;
  }
  .line {
    flex: 1;
    height: 1px;
    background-color: #d6d6d6;
    margin-top: 1rem;
    margin-left: 1rem;
  }
  
  .btn-green {
    background-color: #5fa67f;
    color: #fff;
    transition: 0.5s;
    font-size: 15px;
  }
  .btn-green:hover {
    background-color: #419768;
    color: #fff;
  }
  .btn-violet {
    background-color: #9771e3;
    color: #fff;
    transition: 0.5s;
    font-size: 15px;
  }
  .btn-violet:hover {
    background-color: #7c5ac0;
    color: #fff;
  }
  .nav-link.active{
      background-color: transparent !important;
  }
  .show{
      display: flex !important;
  }

</style>


 <div class="container p-3">

      <ul class="nav mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <div
            class="nav-link active progress-item"
            id="client-info-tab"
            data-toggle="pill"
            data-target="#client-info"
            type="button"
            role="tab"
            aria-controls="pills-home"
            aria-selected="true"
          >
            <i class="bi bi-card-list"></i>
            <span>Client Info</span>
          </div>
        </li>
        <li class="nav-item">
          <div
            class="nav-link progress-item"
            id="assessment-info-tab"
            data-toggle="pill"
            data-target="#assessment-info"
            type="button"
            role="tab"
            aria-controls="pills-profile"
            aria-selected="false"
          >
            <i class="bi bi-chat-left-dots"></i>
            <span>Assessment Info</span>
          </div>
        </li>
        <li class="nav-item">
          <div
            class="nav-link progress-item"
            id="process-tab"
            data-toggle="pill"
            data-target="#process"
            type="button"
            role="tab"
            aria-controls="pills-contact"
            aria-selected="false"
          >
            <i class="bi bi-hdd-stack"></i>
            <span>Process</span>
          </div>
        </li>
        <li class="nav-item">
          <div
            class="nav-link progress-item"
            id="file-notes-tab"
            data-toggle="pill"
            data-target="#file-notes"
            type="button"
            role="tab"
            aria-controls="pills-contact"
            aria-selected="false"
          >
            <i class="bi bi-file-earmark-richtext"></i>
            <span>File Notes</span>
          </div>
        </li>
      </ul>
      <div class="tab-content">
        <div
          class="tab-pane fade show active"
          id="client-info"
          role="tabpanel"
          aria-labelledby="client-info-tab"
        >
          <!-- page1  -->
          <div class="container-fluid my-2 px-4 pb-4">
            <div id="accordion">
              <div class="card">
                <div class="card-header p-0 border-bottom-0" id="headingOne">
                  <h5 class="mb-0">
                    <button
                      class="btn btn-link acc-btn"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      Personal Information
                      <i class="bi bi-plus-lg accordion-icon"></i>
                    </button>
                  </h5>
                </div>

                <div
                  id="collapseOne"
                  class="collapse show"
                  aria-labelledby="headingOne"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    <!-- ---------- -->
                    <section id="services" class="current">
                      <div class="">
                        <div class="container-fluid bootstrap snippets bootdey">
                          <div class="row">
                            <div
                              class="col-md-offset-1 col-sm-12 col-md-12 col-md-10"
                            >
                              <div class="services-list">
                                <div class="row">
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i class="ico bi bi-person highlight"></i>
                                      <div class="text-block">
                                        <div class="info">First Name</div>
                                        <div class="name">Sonu</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i class="ico bi bi-person highlight"></i>
                                      <div class="text-block">
                                        <div class="info">Last Name</div>
                                        <div class="name">Singh</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-calendar2-check highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Date of Birth</div>
                                        <div class="name">15-05-2000</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-gender-trans highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Gender</div>
                                        <div class="name">Male</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-suit-heart highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Marital Status</div>
                                        <div class="name">Never Married</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-calendar2-check highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Visa Expiry Date</div>
                                        <div class="name">30-08-25</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-passport highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Passport Number</div>
                                        <div class="name">V182038</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                  <h5 class="sec-heading">
                                    Contact Information
                                  </h5>
                                  <div class="line"></div>
                                </div>
                                <div class="row">
                                  <div class="col col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-telephone highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Contact No</div>
                                        <div class="name">+91-9632145875</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-envelope highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Email Address</div>
                                        <div class="name">xyz@gmail.com</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col col-md-6">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-geo-alt highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Permanent Address
                                        </div>
                                        <div class="name">New Delhi, India</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-link-45deg highlight"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Social Links</div>
                                        <div class="name"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-gender-ambiguous highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Sub Agent</div>
                                        <div class="name"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- ---------  -->
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 border-bottom-0" id="headingTwo">
                  <h5 class="mb-0">
                    <button
                      class="btn btn-link collapsed acc-btn"
                      data-toggle="collapse"
                      data-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      Secondary Applicant
                      <i class="bi bi-plus-lg accordion-icon"></i>
                    </button>
                  </h5>
                </div>
                <div
                  id="collapseTwo"
                  class="collapse"
                  aria-labelledby="headingTwo"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                    accusamus terry richardson ad squid. 3 wolf moon officia
                    aute, non cupidatat skateboard dolor brunch. Food truck
                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                    sunt aliqua put a bird on it squid single-origin coffee
                    nulla assumenda shoreditch et. Nihil anim keffiyeh
                    helvetica, craft beer labore wes anderson cred nesciunt
                    sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth nesciunt you probably haven't heard of them
                    accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 border-bottom-0" id="headingThree">
                  <h5 class="mb-0">
                    <button
                      class="btn btn-link collapsed acc-btn"
                      data-toggle="collapse"
                      data-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                    >
                      Occupation List
                      <i class="bi bi-plus-lg accordion-icon"></i>
                    </button>
                  </h5>
                </div>
                <div
                  id="collapseThree"
                  class="collapse"
                  aria-labelledby="headingThree"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                    accusamus terry richardson ad squid. 3 wolf moon officia
                    aute, non cupidatat skateboard dolor brunch. Food truck
                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                    sunt aliqua put a bird on it squid single-origin coffee
                    nulla assumenda shoreditch et. Nihil anim keffiyeh
                    helvetica, craft beer labore wes anderson cred nesciunt
                    sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth nesciunt you probably haven't heard of them
                    accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 border-bottom-0" id="headingFour">
                  <h5 class="mb-0">
                    <button
                      class="btn btn-link collapsed acc-btn"
                      data-toggle="collapse"
                      data-target="#collapseFour"
                      aria-expanded="false"
                      aria-controls="collapseFour"
                    >
                      Admin Users <i class="bi bi-plus-lg accordion-icon"></i>
                    </button>
                  </h5>
                </div>
                <div
                  id="collapseFour"
                  class="collapse"
                  aria-labelledby="headingFour"
                  data-parent="#accordion"
                >
                  <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                    accusamus terry richardson ad squid. 3 wolf moon officia
                    aute, non cupidatat skateboard dolor brunch. Food truck
                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                    sunt aliqua put a bird on it squid single-origin coffee
                    nulla assumenda shoreditch et. Nihil anim keffiyeh
                    helvetica, craft beer labore wes anderson cred nesciunt
                    sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth nesciunt you probably haven't heard of them
                    accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="assessment-info"
          role="tabpanel"
          aria-labelledby="assessment-info-tab"
        >
          <!-- page2  -->
          <div class="container-fluid my-2 px-4 pb-4">
            <div class="accordion">
              <div class="accordion-item">
                <div id="">
                  <div class="accordion-body">
                    <!-- -------  -->
                    <section id="services" class="current">
                      <div class="">
                        <div class="container-fluid bootstrap snippets bootdey">
                          <div class="row">
                            <div
                              class="col-md-offset-1 col-sm-12 col-md-12 col-md-10"
                            >
                              <div class="services-list">
                                <div class="d-flex align-items-center mb-4">
                                  <h5 class="sec-heading">
                                    General Information
                                  </h5>
                                  <div class="line"></div>
                                </div>
                                <div class="row">
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-chat-square highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Mode of consultation
                                        </div>
                                        <div class="name">Online</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-building highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Interested for office visit?
                                        </div>
                                        <div class="name">Yes</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-airplane highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Preferred Destination Country
                                        </div>
                                        <div class="name">India</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-airplane-engines highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Preferred intake/month-year to go
                                        </div>
                                        <div class="name">May</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-mortarboard highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Interested Course/Service
                                        </div>
                                        <div class="name">Visa Approval</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                  <h5 class="sec-heading">
                                    Academic Qualification
                                  </h5>
                                  <div class="line"></div>
                                </div>
                                <div class="row py-4">
                                  <div class="col-md-6">
                                    <button class="btn btn-green my-1">
                                      Self Academic Qualification
                                    </button>
                                  </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-violet my-1">
                                      Spouse Academic Qualification
                                    </button>
                                  </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                  <h5 class="sec-heading">Work Experience</h5>
                                  <div class="line"></div>
                                </div>
                                <div class="row py-4">
                                  <div class="col-md-6">
                                    <button class="btn btn-green my-1">
                                      Self Work Experience
                                    </button>
                                  </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-violet my-1">
                                      Spouse Work Experience
                                    </button>
                                  </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                  <h5 class="sec-heading">Work Experience</h5>
                                  <div class="line"></div>
                                </div>
                                <div class="row py-4">
                                  <div class="col-md-6">
                                    <button class="btn btn-green my-1">
                                      Self English Proficiency
                                    </button>
                                  </div>
                                  <div class="col-md-6">
                                    <button class="btn btn-violet my-1">
                                      Spouse English Proficiency
                                    </button>
                                  </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                  <h5 class="sec-heading">
                                    Immigration and Travel
                                  </h5>
                                  <div class="line"></div>
                                </div>
                                <div class="row">
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-passport highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Country of Passport
                                        </div>
                                        <div class="name">India</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-file-earmark-medical highlight"
                                        style="font-size: 20px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Passport Number</div>
                                        <div class="name">IN254975896</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-hand-thumbs-up highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Visa type you currently hold
                                        </div>
                                        <div class="name">Travel Visa</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-calendar highlight"
                                        style="font-size: 18px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Visa Expiry Date</div>
                                        <div class="name">24 May 2025</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-calendar highlight"
                                        style="font-size: 18px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Passport Expiry Date
                                        </div>
                                        <div class="name">24 May 2025</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-calendar highlight"
                                        style="font-size: 18px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Passport Expiry Date
                                        </div>
                                        <div class="name">24 May 2025</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-geo-alt highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Passport Issue Place
                                        </div>
                                        <div class="name">Delhi</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-geo-alt highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Place of Birth</div>
                                        <div class="name">Delhi</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-passport highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">Preferred Visa</div>
                                        <div class="name">Travel Visa</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-passport highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Preferred Visa Other
                                        </div>
                                        <div class="name">Employment Visa</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-hand-thumbs-down highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Have your visa been rejected by any
                                          country previously?
                                        </div>
                                        <div class="name">UAE</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-6 col-sm-4 col-md-3">
                                    <div
                                      class="service-block"
                                      style="visibility: visible"
                                    >
                                      <i
                                        class="ico bi bi-airplane highlight"
                                        style="font-size: 22px"
                                      ></i>
                                      <div class="text-block">
                                        <div class="info">
                                          Which country have you moved/travelled
                                          to?
                                        </div>
                                        <div class="name">USA</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- -------  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="process"
          role="tabpanel"
          aria-labelledby="process-tab"
        >
          <!-- page3 -->
          <div class="container-fluid my-2 px-4 pb-4">
            <div class="accordion">
              <div class="accordion-item">
                <div id="">
                  <div class="accordion-body">
                    <!-- -------  -->
                    <section id="services" class="current">
                      <div class="">
                        <div class="container-fluid bootstrap snippets bootdey">
                          <div class="row">
                            <div
                              class="col-md-offset-1 col-sm-12 col-md-12 col-md-10"
                            >
                              <table class="table">
                                <tbody style="font-size: 15px">
                                  <tr>
                                    <th>Service Category</th>
                                    <td>Immigration</td>
                                  </tr>
                                  <tr>
                                    <th>Service Name</th>
                                    <td>
                                      Skilled Nominated Visa - Subclass 190
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Status</th>
                                    <td>In Progress</td>
                                  </tr>
                                  <tr>
                                    <th>Assigned To</th>
                                    <td>Mayank Kumar</td>
                                  </tr>
                                  <tr>
                                    <th>Assigned By</th>
                                    <td>Anmol Parmar</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- -------  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="file-notes"
          role="tabpanel"
          aria-labelledby="file-notes-tab"
        >
          <!-- page4 -->
          <div class="container-fluid my-2 px-4 pb-4">
            <div class="accordion">
              <div class="accordion-item">
                <div id="">
                  <div class="accordion-body">
                    <!-- -------  -->
                    <section>
                        <textarea id="editor" ></textarea>
                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn text-white" style="background: #7744ff">Save</button>
                            <button class="btn" style="background:#f1f1f1">Print All Notes</button>
                        </div>
                    </section>
                    <!-- -------  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection