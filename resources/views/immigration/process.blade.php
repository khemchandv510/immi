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

    .cke {
            min-height: 300px; /* Set minimum height for CKEditor */
    }
    .cke_button_icon  {
         filter: hue-rotate(180deg);
    }
    /*----------*/
    .nested-nav-link{
        background: #fff !important;
        color: #111 !important;
    }
    .nested-nav-link.active{
        border-bottom: 2px solid #7744ff !important;
        border-radius: 0px !important;
        color: #111 !important;
        background: #f1edfc !important;
    }
    input[type="date"], input[type="time"]{
        width: auto !important;
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
        <li class="nav-item">
          <div
            class="nav-link progress-item"
            id="file-notes-tab"
            data-toggle="pill"
            data-target="#documents"
            type="button"
            role="tab"
            aria-controls="pills-contact"
            aria-selected="false"
          >
            <i class="bi bi-archive"></i>
            <span>Documents</span>
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
                                      style="visibility: visible">
                                      <i class="ico bi bi-person highlight"></i>
                                      <div class="text-block">
                                        <div class="info">First Name</div>
                                        <div class="name">{{$getStudent->name ?? ''}}</div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="col-6 col-sm-4 col-md-3">
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
                                  </div> -->
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
                                        <div class="name">{{$getStudent->dob ?? ''}}</div>
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
                                        <div class="name">{{$getStudent->gender ?? ''}}</div>
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
                                        <div class="name">- </div>
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
                                        <div class="name">{{$getStudent->passport ?? ''}}</div>
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
                                        <div class="name">{{$getStudent->contact ?? ''}}</div>
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
                                        <div class="name">{{$getStudent->email ?? ''}} </div>
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
                                        <div class="name"> {{$getStudent->address_line1 ?? ''}}</div>
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
          aria-labelledby="file-notes-tab" >
          <!-- page4 -->
          <div class="container my-2 px-4 pb-4">
            <div class="accordion">

            
              <div class="accordion-item">
                <div id="">
                  <div class="accordion-body">
                    <!-- -------  -->

                    <form action="" method="get">
                      <div class="form-group">
                        <!-- <label for="exampleInputEmail1">File Note</label> -->
                        
                        <textarea class="form-control" id="editor" rows="10">
                        {{$getStudent->file_note ?? '' }}
                        </textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                      
                    <!-- -------  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div
          class="tab-pane fade d-flex flex-column"
          id="documents"
          role="tabpanel"
          aria-labelledby="documents-tab" >
            <!--page5-->
            <ul class="nav nav-tabs mt-3" id="nestedTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link nested-nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">956 Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nested-nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">Client Agreement</a>
                </li>
            </ul>

            <div class="tab-content" id="nestedTabContent">
                <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <div style="padding: 2rem;">
        <!-- heading -->
         <div style="display: grid;grid-template-columns: repeat(5,1fr);align-items: center;text-align: center;border-bottom: 1px solid #111;padding-bottom: 1rem;">
            <div><img src="assets/austraia.PNG" alt=""></div>
            <div style="grid-column: 2/5;"><h1>Appointment of a registered migration agent, 
                legal practitioner or exempt person</h1></div>
            <div><img src="assets/form956.PNG" alt=""></div>
         </div>

         <!-- content page 1 -->
          <div style="display: grid;grid-template-columns: 1fr 1fr;padding: 2rem 0;">
            <div style="padding: 1rem;border-right: 1px solid #c6c6c6;">
                <div>
                    <p>Please open this form using Adobe Acrobat Reader. 
                        Either type (in English) in the fields provided or print this form 
                        and complete it (in English) using a pen and BLOCK LETTERS.</p>
                    <p style="margin-top: 1rem;">Tick where applicable 3 (<span>&#10003;</span>)</p>
                </div>

                <!-- 1) -->
                <div>
                    <p style="margin-top: 1rem;"><b>1) </b> Are you notifying the Department that you have been appointed to provide immigration assistance, or that your appointment has ended?</p>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="appointment" value="new" />
                            <span>New appointment</span>
                        </label>
                        <p style="margin-left: 1rem;">
                            <b style="display: block;">Complete Part A and Part C</b>
                            <span>You do not need to complete Part B</span>
                        </p>
                    </div>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="appointment" value="ended" />
                            <span>Appointment has ended</span>
                        </label>
                        <p style="margin-left: 1rem;">
                            <b style="display: block;">Complete Part B and Part C</b>
                            <span>You do not need to complete Part A</span>
                        </p>
                    </div>
                </div>
                
                <!-- ------ -->
                 <div style="margin: 3rem 0;font-size: 1.3rem;font-style: italic;">
                    <b style="display: block;">Part A – New appointment</b>
                    <b>Registered migration agent/legal 
                        practitioner/exempt person’s details</b>
                </div>
                <!-- -----   -->

                <!-- 2) -->
                 <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>2) </b> Registered migration agent/legal practitioner/exempt person’s details</p>
                    
                    <p style="display: flex; gap: 1rem; margin-top: 1rem; margin-left: 1rem;">
                        <span style="margin-right: 1rem;">Title:</span>
                        
                        <label>
                            <input type="radio" name="title" value="Mr" />
                            Mr
                        </label>
                        
                        <label>
                            <input type="radio" name="title" value="Mrs" />
                            Mrs
                        </label>
                        
                        <label>
                            <input type="radio" name="title" value="Miss" />
                            Miss
                        </label>
                        
                        <label>
                            <input type="radio" name="title" value="Ms" />
                            Ms
                        </label>
                        
                        <label>
                            <input type="radio" name="title" value="Other" />
                            Other
                        </label>
                    </p>
                    <p style="margin-top: 1rem;margin-left: 1rem;">Family Name: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;">Given Name: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;">Exempt person’s date of birth: <span><input type="date"></span></p>
                </div>
                

                <!-- 3) -->
                 <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>3) </b>Organisation name (if applicable): <span><input type="text"></span></p>
                 </div>

                <!-- 4) -->
                 <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>4) </b>Business or residential address: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;"></b>Postcode: <span><input type="number"></span></p>
                 </div>

                <!-- 5) -->
                 <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>5) </b>Address for correspondence: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;"></b>Postcode: <span><input type="number"></span></p>
                 </div>

                <!-- 6) -->
                 <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>6) </b>Telephone numbers:</p>
                    <p style="display: flex;gap: 1rem;margin-top: 1rem;margin-left: 1rem;"><span style="margin-right: 1rem;">Office hours:</span><span>Country Code:</span><span><input style="width: 3rem;" type="text"></span><span>Area Code:</span><span><input style="width: 3rem;" type="text"></span><span>Number:</span><span><input type="number"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;"></b>Mobile/cell: <span><input type="number"></span></p>
                 </div>
            </div>

            <div style="padding: 1rem;margin-left: 1rem;">
                <!-- 7) -->
                <div>
                    <p><b>7) </b> Do you agree to the Department communicating with you by email or other electronic means?</p>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center;gap: 5px;">
                            <input type="radio" name="communication" value="no" />
                            <span>No</span>
                        </label>
                    </div>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center;gap: 5px;">
                            <input type="radio" name="communication" value="yes" />
                            <span>Yes</span>
                        </label>
                        <span style="margin-left: 1rem;">Give Details</span>
                    </div>
                    
                    <p style="margin-top: 1rem; margin-left: 1rem;">
                        <b>Email address: </b><span><input type="email"></span>
                    </p>
                </div>
                

                <!-- 8 -->
                <div style="margin-top: 2rem;">
                    <p><b>8) </b> In what capacity are you providing assistance?</p>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="capacity" value="registered_agent" />
                            <span>Registered migration agent</span>
                        </label>
                        <p style="margin-left: 1rem;">
                            <span>Go to Question 9</span>
                        </p>
                    </div>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="capacity" value="legal_practitioner" />
                            <span>Legal practitioner</span>
                        </label>
                        <p style="margin-left: 1rem;">
                            <b style="display: block;">Go to Question 9</b>
                        </p>
                    </div>
                    
                    <div style="display: flex; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="capacity" value="exempt_person" />
                            <span>Exempt person</span>
                        </label>
                        <p style="margin-left: 1rem;">
                            <b style="display: block;">Go to Question 11</b>
                        </p>
                    </div>
                </div>
                

                <!-- 9) -->
                <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>9) </b>Migration Agent Registration 
                        Number (MARN): <span><input type="number"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;"></b>Legal Practitioner Number (LPN): <span><input type="number"></span></p>
                </div>

                <!-- 10 -->
                <div style="margin-top: 2rem;">
                    <p style="margin-top: 1rem;"><b>10) </b> Is there another registered migration agent or legal practitioner from 
                        your organisation who the Department may discuss this case with if 
                        you are unavailable?</p>
                        <div style="margin-top: 1rem; margin-left: 1rem;">
                            <div style="display: flex; align-items: center; margin-top: 1rem;">
                                <label style="display: flex; align-items: center; gap: 5px;">
                                    <input type="checkbox" name="response" value="no" />
                                    <span>No</span>
                                </label>
                                <p style="margin-left: 1rem;">
                                    <b style="display: block;">Go to Question 12</b>
                                </p>
                            </div>
                            
                            <div style="display: flex; align-items: center; margin-top: 1rem;">
                                <label style="display: flex; align-items: center; gap: 5px;">
                                    <input type="checkbox" name="response" value="yes" />
                                    <span>Yes</span>
                                </label>
                                <p style="margin-left: 1rem;">
                                    <span>Give details of the other registered migration agent/legal practitioner</span>
                                </p>
                            </div>
                        </div>
                        
                    <p style="margin-top: 1rem;margin-left: 1rem;">Family Name: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;">Given Name: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;">Telephone numbers:</p>
                    <p style="display: flex;gap: 1rem;margin-top: 1rem;margin-left: 1rem;"><span style="margin-right: 1rem;">Office hours:</span><span>Country Code:</span><span><input style="width: 3rem;" type="text"></span><span>Area Code:</span><span><input style="width: 3rem;" type="text"></span><span>Number:</span><span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;"></b>Mobile/cell: <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;">Migration Agent Registration 
                        Number (MARN): <span><input type="text"></span></p>
                    <p style="margin-top: 1rem;margin-left: 1rem;"></b>Legal Practitioner Number (LPN): <span><input type="text"></span></p>
                </div>

                <!-- 11 -->
                <div style="margin-top: 2rem;">
                    <p><b>11) </b> Reason you are an exempt person</p>
                    
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="exempt_reason" value="close_family" />
                            <span>Close family member (spouse, child, parent, brother or sister)</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="exempt_reason" value="sponsor" />
                            <span>Sponsor</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="exempt_reason" value="nominator" />
                            <span>Nominator</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="exempt_reason" value="diplomatic_member" />
                            <span>Member of a diplomatic mission, consular post or international organisation</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="exempt_reason" value="parliament_member" />
                            <span>Member of parliament or their staff</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="exempt_reason" value="public_service" />
                            <span>Official appointed or engaged under the Public Service Act 1999 or member of state/territory public services giving immigration assistance as part of their duties</span>
                        </label>
                    </div>
                </div>
                

            </div>
          </div>

          <!-- content page 2 -->
           <div style="display: grid;grid-template-columns: 1fr 1fr;padding: 2rem 0;">
                <div style="padding: 1rem;border-right: 1px solid #c6c6c6;">

                <!-- ------ -->
                <div style="margin: 2rem 0;font-size: 1.3rem;font-style: italic;">
                    <b style="display: block;margin-left: 3rem;">Clients Detail</b>
                </div>
                <!-- -----   -->

                    <!-- 12 -->
                    <div style="margin-top: 2rem;">
                        <p><b>12) </b> The person receiving immigration assistance (ie. the client) is: (tick all that apply)</p>
                        
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="checkbox" name="client_type" value="visa_applicant" />
                                <span>Visa applicant</span>
                            </label>
                        </div>
                    
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="checkbox" name="client_type" value="sponsor" />
                                <span>Sponsor or sponsor applicant</span>
                            </label>
                        </div>
                    
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="checkbox" name="client_type" value="nominator" />
                                <span>Nominator or nominator applicant</span>
                            </label>
                        </div>
                    
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="checkbox" name="client_type" value="proposer" />
                                <span>Proposer or proposer applicant</span>
                            </label>
                        </div>
                    
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="checkbox" name="client_type" value="visa_holder" />
                                <span>Visa holder whose visa is being considered for cancellation or has been cancelled</span>
                            </label>
                        </div>
                    
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem; justify-content: space-between;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="checkbox" name="client_type" value="ministerial_intervention" />
                                <span>Person requesting ministerial intervention</span>
                            </label>
                        </div>
                    </div>
                    

                    <!-- 13 -->
                     <div style="margin-top: 2rem;">
                        <p><b>13) </b> <b>Client 1</b></p>
                        <p style="margin-left: 1rem;margin-top: 1rem;">Full name (If the client is an organisation, provide the name of the 
                            contact person)</p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Family Name: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Given Name: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Date of birth: <span><input type="date"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Organisation name (if applicable): <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Business or residential address: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Telephone numbers:</p>
                        <p style="display: flex;gap: 1rem;margin-top: 1rem;margin-left: 1rem;"><span style="margin-right: 1rem;">Office hours:</span><span>Country Code:</span><span><input style="width: 3rem;" type="text"></span><span>Area Code:</span><span><input style="width: 3rem;" type="text"></span><span>Number:</span><span><input type="number"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"></b>Mobile/cell: <span><input type="number"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"></b>Department of Home Affairs
                            Client ID number (if known): <span><input type="number"></span></p>
                     </div>

                    <!-- 14 -->
                     <div style="margin-top: 2rem;">
                        <p><b>14) </b> Names of other clients you are providing immigration assistance to in 
                            relation to the same matter (eg. dependant applicants)</p>
                        <div style="margin-bottom: 1rem;">
                            <p style="margin-top: 1rem;margin-left: 1rem;">1. Family Name: <span><input type="text"></span></p>
                            <p style="margin-top: 1rem;margin-left: 2rem;">Given Name: <span><input type="text"></span></p>
                        </div>
                        <div style="border-top: 1px solid #c6c6c6;margin-bottom: 1rem;">
                            <p style="margin-top: 1rem;margin-left: 1rem;">2. Family Name: <span><input type="text"></span></p>
                            <p style="margin-top: 1rem;margin-left: 2rem;">Given Name: <span><input type="text"></span></p>
                        </div>
                        <div style="border-top: 1px solid #c6c6c6;margin-bottom: 1rem;">
                            <p style="margin-top: 1rem;margin-left: 1rem;">3. Family Name: <span><input type="text"></span></p>
                            <p style="margin-top: 1rem;margin-left: 2rem;">Given Name: <span><input type="text"></span></p>
                        </div>
                        <div style="border-top: 1px solid #c6c6c6;margin-bottom: 1rem;">
                            <p style="margin-top: 1rem;margin-left: 1rem;">4. Family Name: <span><input type="text"></span></p>
                            <p style="margin-top: 1rem;margin-left: 2rem;">Given Name: <span><input type="text"></span></p>
                        </div>
                        <div style="border-top: 1px solid #c6c6c6;margin-bottom: 1rem;">
                            <p style="margin-top: 1rem;margin-left: 1rem;">5. Family Name: <span><input type="text"></span></p>
                            <p style="margin-top: 1rem;margin-left: 2rem;">Given Name: <span><input type="text"></span></p>
                        </div>
                     </div>
                </div>
                
                <div style="padding: 1rem;">

                    <!-- ------ -->
                    <div style="margin: 2rem 0;font-size: 1.3rem;font-style: italic;">
                        <b style="display: block;margin-left: 3rem;">Type of assistance</b>
                    </div>
                    <!-- -----   -->

                    <!-- 15 -->
                    <div>
                        <p><b>15) </b> Are you providing assistance with an application process, a cancellation 
                            process or specific matter? (tick one only)</p>
                            <div>
                                <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                                    <label style="display: flex; align-items: center; gap: 5px;">
                                        <input type="checkbox" name="process" value="application" />
                                        <span><b>Application</b> process</span>
                                    </label>
                                </div>
                                <p style="margin-top: 1rem; margin-left: 3rem;">Type of Application: <span><input type="text"></span></p>
                                <p style="margin-top: 1rem; margin-left: 3rem;">Date lodged: <span><input type="date"></span></p>
                                <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 3rem;">
                                    <label style="display: flex; align-items: center; gap: 5px;">
                                        <span>Not yet lodged</span>
                                        <input type="checkbox" name="lodged_status" value="not_yet_lodged" />
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                                    <label style="display: flex; align-items: center; gap: 5px;">
                                        <input type="checkbox" name="process" value="cancellation" />
                                        <span><b>Cancellation</b> process</span>
                                    </label>
                                </div>
                                <p style="margin-top: 1rem; margin-left: 3rem;">Subclass of visa: <span><input type="text"></span></p>
                                <p style="margin-top: 1rem; margin-left: 3rem;">Date lodged: <span><input type="date"></span></p>
                            </div>
                            
                            <div>
                                <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                                    <label style="display: flex; align-items: center; gap: 5px;">
                                        <input type="checkbox" name="specific_matter" value="details" />
                                        <span><b>Specific matter</b> – give details (eg. sponsorship monitoring and sanction activity by the Department, or for only one stage of a two-stage visa, ministerial intervention)</span>
                                    </label>
                                </div>
                                <p style="margin-top: 1rem; margin-left: 3rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, accusamus placeat dolorem ut nesciunt possimus obcaecati at harum similique est vitae expedita eum asperiores aliquam perferendis quia tempore nobis autem.</p>
                            </div>
                            
                    </div>

                <!-- 16 -->
                 <div style="margin-top: 2rem;">
                    <p><b>16) </b> Provide at least one of the following numbers (if known)</p>
                    <div style="margin-bottom: 1rem;">
                        <p style="margin-top: 1rem;margin-left: 1rem;">Department of Home Affairs 
                            Request ID number (RID): <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Department of Home Affairs 
                            Transaction Reference Number 
                            (TRN): <span><input type="text"></span></p>
                    </div>
                </div>

                <!-- ------ -->
                <div style="margin: 2rem 0;font-size: 1.3rem;font-style: italic;">
                    <b style="display: block;margin-left: 3rem;">Authorised recipient</b>
                </div>
                <!-- -----   -->

                <!-- 17) -->
                <div>
                    <p><b>17) </b> Have you been authorised to receive written communication on behalf of your client(s) in relation to the matter indicated in Question 15?</p>
                    
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="authorization" value="no" />
                            <span>No</span>
                        </label>
                        <span style="margin-left: 1rem;">- Go to Part C</span>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="authorization" value="yes" />
                            <span>Yes</span>
                        </label>
                        <span style="margin-left: 1rem;">- Go to Part C</span>
                    </div>
                </div>
                

                </div>
            </div>


          <!-- content page 3 -->
           <div style="display: grid;grid-template-columns: 1fr 1fr;padding: 2rem 0;">
                <div style="padding: 1rem;border-right: 1px solid #c6c6c6;">

                <!-- ------ -->
                <div style="margin: 2rem 0;font-size: 1.3rem;font-style: italic;">
                    <b style="display: block;margin-left: 3rem;">Part B - Ending Appointment</b>
                </div>
                <!-- ------- -->

                    <!-- 18 -->
                    <div style="margin-top: 2rem;">
                        <p><b>18) </b> <b>Registered migration agent/legal practitioner/exempt 
                            person’s details</b></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Family Name: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Given Name: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Organisation name (if applicable): <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Telephone numbers:</p>
                        <p style="display: flex;gap: 1rem;margin-top: 1rem;margin-left: 1rem;"><span style="margin-right: 1rem;">Office hours:</span><span>Country Code:</span><span><input style="width: 3rem;" type="text"></span><span>Area Code:</span><span><input style="width: 3rem;" type="text"></span><span>Number:</span><span><input type="number"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"></b>Mobile/cell: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"><i>(if applicable)</i></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"></b>Migration Agent Registration 
                            Number (MARN): <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"></b>Legal Practitioner Number (LPN): <span><input type="text"></span></p>
                     </div>

                    <!-- 19) -->
                    <div style="margin-top: 2rem;">
                        <p><b>19) </b> Was the person named at Question 18 also appointed as the client’s authorised recipient?</p>
                        
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="radio" name="authorized_recipient" value="no" />
                                <span>No</span>
                            </label>
                        </div>
                        
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="radio" name="authorized_recipient" value="yes" />
                                <span>Yes</span>
                            </label>
                        </div>
                        
                        <p style="margin-top: 1rem; margin-left: 1rem;"><i>(if yes) </i> Is the client ending their appointment as authorised recipient?</p>
                    
                        <div style="margin-left: 1rem; margin-top: 1rem;">
                            <div style="display: flex; align-items: center; margin-top: 1rem;">
                                <label style="display: flex; align-items: center; gap: 5px;">
                                    <input type="radio" name="ending_appointment" value="no" />
                                    <span>No</span>
                                </label>
                            </div>
                    
                            <div style="display: flex; align-items: center; margin-top: 1rem;">
                                <label style="display: flex; align-items: center; gap: 5px;">
                                    <input type="radio" name="ending_appointment" value="yes" />
                                    <span>Yes</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    

                    <!-- 20 -->
                    <div style="margin-top: 2rem;">
                        <p><b>20) </b> <b>Client's Details</b></p>
                        <p style="margin-left: 1rem;margin-top: 1rem;">Full name (If the client is an organisation, provide the name of the 
                            contact person)</p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Family Name: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Given Name: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Date of birth: <span><input type="date"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Organisation name (if applicable): <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Business or residential address: <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Post Code: <span><input type="number"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Telephone numbers:</p>
                        <p style="display: flex;gap: 1rem;margin-top: 1rem;margin-left: 1rem;"><span style="margin-right: 1rem;">Office hours:</span><span>Country Code:</span><span><input style="width: 3rem;" type="text"></span><span>Area Code:</span><span><input style="width: 3rem;" type="text"></span><span>Number:</span><span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;"></b>Mobile/cell: <span><input type="text"></span></p>
                     </div>

                     <!-- 21 -->
                     <div style="margin-top: 2rem;">
                        <p><b>21) </b> Does the client agree to the Department communicating with them by email or other electronic means?</p>
                        
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="radio" name="communication_agreement" value="no" />
                                <span>No</span>
                            </label>
                        </div>
                        
                        <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="radio" name="communication_agreement" value="yes" />
                                <span>Yes</span>
                            </label>
                            <span style="margin-left: 1rem;">- Give Details</span>
                        </div>
                        
                        <p style="margin-top: 1rem; margin-left: 1rem;">Email Address: <span><input type="email"></span></p>
                    </div>
                    
                </div>
                
                <div style="padding: 1rem;">

                    <!-- 22 -->
                    <div style="margin-top: 2rem;">
                        <p><b>22) </b> Provide at least one of the following numbers</p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Department of Home Affairs 
                            Request ID number (RID): <span><input type="text"></span></p>
                        <p style="margin-top: 1rem;margin-left: 1rem;">Department of Home Affairs 
                            Transaction Reference Number 
                            (TRN): <span><input type="text"></span></p>
                    </div>

                </div>
            </div>


          <!-- content page 4 -->
           <div style="display: grid;grid-template-columns: 1fr 1fr;padding: 2rem 0;">
                <div style="padding: 1rem;border-right: 1px solid #c6c6c6;">

                <!-- ------ -->
                <div style="margin: 2rem 0;font-size: 1.3rem;font-style: italic;">
                    <b style="display: block;margin-left: 3rem;">Part C – Declarations</b>
                    <b style="display: block;margin-left: 3rem;">Declaration by registered migration 
                        agent/legal practitioner/exempt person</b>
                </div>
                <!-- -----   -->

                <!-- 23 -->
                <div style="margin-top: 2rem;">
                    <p style="font-style: italic;"><b>23) </b> Tick all that apply</p>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="appointment_migration_agent" value="appointed" />
                            <span><b>Appointment of registered migration agent / legal practitioner / exempt person</b> – I declare that I have been appointed by the client named in Part A of this form as a registered migration agent/legal practitioner/exempt person and that I will act on the client’s behalf as permitted by law.</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="appointment_authorised_recipient" value="authorised_recipient" />
                            <span><b>Appointment of authorised recipient</b> – I understand that I have been appointed by the persons named in Part A of this form to be their authorised recipient; and as the authorised recipient, all documents that would otherwise be sent to the persons named in Part A will be sent to me, including by electronic means as indicated in Question 7 (if applicable)</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="ending_appointment_migration_agent" value="ending_appointment" />
                            <span><b>Ending appointment of registered migration agent / legal practitioner / exempt person</b> – I declare that I am no longer acting on behalf of the client named in Part B and I have advised the client accordingly.</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="withdrawal_authorised_recipient" value="withdrawal" />
                            <span><b>Withdrawal of authorised recipient appointment</b> – I understand that I am no longer acting as authorised recipient in this matter.</span>
                        </label>
                    </div>
                
                    <p style="margin-left: 1rem; margin-top: 1rem;"><b>Signature of registered migration agent/legal practitioner/exempt person</b></p>
                    <input type="file" style="margin-left: 1rem; margin-top: 2rem;">
                    <p style="margin-top: 1rem; margin-left: 1rem;">Date: <span><input type="date"></span></p>
                </div>
                

                <!-- ------ -->
                <div style="margin: 2rem 0;font-size: 1.3rem;font-style: italic;">
                    <b style="display: block;margin-left: 3rem;">Declaration by client</b>
                </div>
                <!-- -----   -->

                <!-- 24 -->
                <div style="margin-top: 2rem;">
                    <p style="font-style: italic;"><b>24) </b> Tick all that apply</p>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="appointment_migration_agent" value="appointed" />
                            <span><b>Appointment of registered migration agent / legal practitioner / exempt person</b> – I declare that I have appointed the registered migration agent/legal practitioner/exempt person named in Part A of this form to provide assistance with matters as indicated on this form.</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="appointment_authorised_recipient" value="authorised_recipient" />
                            <span><b>Appointment of authorised recipient</b> – I declare that I have appointed the person named at Question 2 of this form to receive all documents relating to the matter indicated at Question 15 on my behalf.</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="ending_appointment" value="ending_appointment" />
                            <span><b>Ending appointment</b> – I declare that the registered migration agent/legal practitioner/exempt person named in Part B is no longer acting on my behalf.</span>
                        </label>
                    </div>
                
                    <div style="display: flex; align-items: center; margin-top: 1rem; margin-left: 1rem;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="checkbox" name="withdrawal_authorised_recipient" value="withdrawal" />
                            <span><b>Withdrawal of authorised recipient appointment</b> – I declare that the registered migration agent/legal practitioner/exempt person listed at Question 18 on this form is no longer authorised to receive documents on my behalf. I understand that future correspondence from the Department will be sent to the address that I have provided at Question 20. I will inform the Department of any changes to my address for correspondence.</span>
                        </label>
                    </div>
                
                    <p style="margin-left: 1rem; margin-top: 1rem;"><b>Signature of client</b></p>
                    <input type="file" style="margin-left: 1rem; margin-top: 2rem;">
                    <p style="margin-top: 1rem; margin-left: 1rem;">Date: <span><input type="date"></span></p>
                </div>
                

                    
                </div>
                
                <div style="padding: 1rem;">

                </div>
            </div>

    </div>
                </div>
                <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <h4>Notifications Tab Content</h4>
                    <p>This is the content for the Notifications tab.</p>
                </div>
            </div>
        </div>
      </div>
    </div>



@endsection