<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<style>
    .client-agreement-heading{
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
    .client-agreement-heading span{
        background-color: #e6def8;
        border-radius: 5px;
        padding: 5px;
        transition: .5s;
        cursor: pointer;
    }
    .client-agreement-heading span:hover{
        background-color: #7744ff;
        color: white;
    }
    .form-label{
        margin-bottom: -15px;
        margin-left: 14px;
        background: white;
        padding: 5px;
        font-size: 12px;
        position: relative;
        z-index: 2;
    }
    .form-control{
        padding: .8rem;
        font-size: 14px;
    }
    .form-control:focus {
        background-color: #fff;
        border-color: #f4f1fc;
        outline: 0;
        box-shadow: 0 0 0 .25rem #f4f1fc40 !important;
    }
    .form-select:focus {
        background-color: #fff;
        border-color: #f4f1fc;
        outline: 0;
        box-shadow: 0 0 0 .25rem #f4f1fc40 !important;
    }
    .form-select{
        padding: .8rem;
        font-size: 14px;
    }
    .form-label b{
        color: red;
    }

    .form-check{
        font-size: 14px;
    }

    .form-check-input:checked {
        background-color: #7744ff;
        border-color: #f4f1fc40;
        box-shadow: none !important;
    }
    .form-check-label{
        font-size: 12px;
    }
    .table{
        font-size: 12px;
    }
    .btnn:hover{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
    }
    .progress-item-box{
        display: flex;
        padding: 1rem 0;
        flex-wrap: wrap;
    }
    .progress-item{
        display: flex;
        gap: 5px;
        justify-content: start;
        align-items: center;
        color: #b8b8b8;
        position: relative;
        --right-space: 40px;
        padding-right: var(--right-space);
    }
    .progress-item::after{
        content: '';
        --line-width: 20px;
        position: absolute;
        right: calc((var(--right-space) - var(--line-width))/2);
        height: 2px;
        width: var(--line-width);
        background-color: #b8b8b8;
    }
    .progress-item i{
        background-color: rgb(230, 230, 230);
        padding: 13px;
        border-radius: 50%;
        width: 8px;
        height: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(163, 163, 163);
    }
    .progress-item-box .progress-item:last-child{
        --right-space: 0;
    }
    .progress-item-box .progress-item:last-child::after{
        display: none;
    }
    .progress-item-active i{
        color: #7744ff;
        background-color: #e6def8;
    }
    .progress-item-active span{
        color: #7744ff;
    }
    .progress-item-previous span{
        color: #7744ff;
    }
    .select2{
        width: 100% !important;
        display: block;
        width: 100%;
        padding: .6rem;
        -moz-padding-start: calc(0.75rem - 3px);
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-repeat: no-repeat;
        background-position: right .75rem center;
        background-size: 16px 12px;
        border: 1px solid #ced4da;
        border-radius: .375rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .select2-container--default .select2-selection--single{
        border: none;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        padding: 0.3rem 0.6rem;
        line-height: normal;
    }
    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable{
        background-color: #7744ff;
    }
</style>
<body>

    <div class="container mt-4 border p-0" style="border-top-left-radius: 9px;border-top-right-radius: 9px;">
        <div class="client-agreement-heading border-bottom">
            <h5>Client Agreement Form</h5>
            <span class="fa fa-times"></span>
        </div>
        <div class="progress-item-box px-4 shadow-sm">
            <div class="progress-item progress-item-previous">
                <i class="fa fa-times"></i>
                <span>Client Details</span>
            </div>
            <div class="progress-item progress-item-active">
                <i class="fa fa-times"></i>
                <span>Client Details</span>
            </div>
            <div class="progress-item">
                <i class="fa fa-times"></i>
                <span>Client Details</span>
            </div>
        </div>


        <div class="container">
            <div class="p-4 rounded">
                <form>
                    <div class="row">
    
                        <div class="col-md-12 p-2 my-4" style="font-size: 14px;">
                            <b>&nbsp;&nbsp;Main Applicant</b>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> First Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Date of Birth</label>
                                <input type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Address1</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Address2</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Mobile</label>
                                <input type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Country</label>
                                <select class="form-select select-box" aria-label="Default select example" required>
                                    <option selected>---Select---</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> State</label>
                                <select class="form-select select-box" aria-label="Default select example" required>
                                    <option selected>---Select---</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> City</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Zipcode</label>
                                <input type="number" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 p-2 my-4" style="font-size: 14px;">
                        <b>&nbsp;&nbsp;Secondary/Dependent Applicant</b>
                    </div>

                    <div class="row px-md-3 align-items-center rounded shadow-sm border py-2 mb-4" style="background-color: #f4f1fc;">
                        <div class="col-6 d-md-none">
                            <b>Add Applicant</b>
                        </div>
                        <div class="col-md-3 d-none d-md-block">First Name</div>
                        <div class="col-md-3 d-none d-md-block">Last Name</div>
                        <div class="col-md-3 d-none d-md-block">Relationship to you</div>
                        <div class="col-md-3 col-6 text-end">
                            <button type="button" class="btn ms-auto text-white fa fa-plus" onclick="addApplicantCol()" style="background-color: #7744ff;padding: .7rem 1rem;"></button>
                        </div>
                    </div>
                    <div id="addColumns"></div>
                    <div class="text-end">
                        <button type="submit" class="btnn btn text-dark mx-2" style="background-color: #f1f1f1; margin-left: auto;"><span class="fa fa-long-arrow-left me-2"></span>Prev</button>
                        <button type="submit" class="btnn btn text-white mx-2" style="background-color: #7744ff; margin-left: auto;">Next<span class="fa fa-long-arrow-right ms-2"></span></button>
                    </div>
                  </form>

                  <!-- -----------------Page 2------------------------ -->
                  <form action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label m-0"><b>*</b><strong>In what capacity are you providing assistance?</strong></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option1" checked>
                                    <label class="form-check-label" for="inlineRadio1"><b>Registered Migration Agent</b></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option2">
                                    <label class="form-check-label" for="inlineRadio2"><b>Exempt Person</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-2" style="font-size: 14px;">
                            <b>&nbsp;&nbsp;Primary Agent Details</b>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Registered Migration Agent</label>
                                <select class="form-select select-box" aria-label="Default select example" required>
                                    <option selected>---Select Migration Agent---</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Other Migration Agent</label>
                                <select class="form-select select-box" aria-label="Default select example" required>
                                    <option selected>---No Other RMA---</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4 p-4 rounded" style="background-color: #f1f1f1;">
                        <div class="col-md-6">
                            <h6 style="font-size: 14px">Residential or Business Address</h6>
                            <p style="font-size: 14px;font-weight: 700;">xyz sultan steet chanakya mor, chand nagar</p>
                        </div>
                        <div class="col-md-6">
                            <h6 style="font-size: 14px">Residential or Business Address</h6>
                            <p style="font-size: 14px;font-weight: 700">xyz sultan steet chanakya mor, chand nagar</p>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btnn btn text-dark mx-2" style="background-color: #f1f1f1; margin-left: auto;"><span class="fa fa-long-arrow-left me-2"></span>Prev</button>
                        <button type="submit" class="btnn btn text-white mx-2" style="background-color: #7744ff; margin-left: auto;">Next<span class="fa fa-long-arrow-right ms-2"></span></button>
                    </div>
                  </form>


                  <!-- page3 -->
                  <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Communication Email Id</label>
                                <input type="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label w-100 m-0 mb-2" style="font-size: 14px;"><b class="text-dark">The Person Receiving Immigration Assistance</b>
                                   </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">
                                        <p>Visa Applicant</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline w-100">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">
                                        <p>Sponsor or Sponsor Applicant</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline w-100">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">
                                        <p>Nominator or Nominator Applicant</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline w-100">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option4">
                                    <label class="form-check-label" for="inlineRadio3">
                                        <p>Proposer or Proposer Applicant</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline w-100">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option5">
                                    <label class="form-check-label" for="inlineRadio3">
                                        <p>Visa holder whose visa is being considered for cancellation or has been cancelled</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline w-100">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option5">
                                    <label class="form-check-label" for="inlineRadio3">
                                        <p>Person requesting ministerial intervention</p>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label w-100 m-0 mb-2" style="font-size: 14px;"><b class="text-dark">Type of Assistance</b>
                                   </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">
                                        <p>Application Process</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">
                                        <p>Cancellation Process</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">
                                        <p>Specific Matter</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><b>*</b> Types of Application</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2 m-auto">
                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input me-2" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Not Yet Logged</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="lodge-date"><b>*</b> Date of Lodge</label>
                                <input type="date" class="form-control" id="lodge-date" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label w-100 m-0 mb-2" style="font-size: 14px;"><b class="text-dark">Authorised Recipient</b>
                                   </label>
                                   <p style="font-size: 14px;padding: 5px;">Have you been Authorised to receive written Communication on behalf of your client(s) in relation to the matter indicated in Q15?</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">
                                        <p>No</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btnn btn text-dark mx-2" style="background-color: #f1f1f1; margin-left: auto;"><span class="fa fa-long-arrow-left me-2"></span>Prev</button>
                        <button type="submit" class="btnn btn text-white mx-2" style="background-color: #7744ff; margin-left: auto;">Next<span class="fa fa-long-arrow-right ms-2"></span></button>
                    </div>
                  </form>

                  <!-- page4 -->
                  <div class="row justify-content-center align-items-center text-center my-5" >
                    <div class="col-md-10 p-5 rounded" style="background-color: #f4f1fc;font-size: 14px;">
                        <p class="fw-bold">You have successfully filled in all the information that will be reflected in the latest version of form 956</p>
                        <p>To proceed further and complete the process, the form will be sent to get signature from you and your client through KDNSIGN</p>
                        <p class="fw-bold">Kindly verfiy the following Email Address:</p>
                        <p class="fw-bold">Your Email: <span class="fw-normal me-3">your@gmail.com</span>  Client Email: <span class="fw-normal">client@gmail.com</span></p>
                        <p>Click on the button to Preview and Verify, as the sender, to make sure the details reflect correctly in the form.</p>
                        <p class="fw-bold">Note: Once you submit and get the form signed, it will not be reverted.</p>
                        <div class="mt-5">
                            <button type="submit" class="btnn btn text-dark mx-2 shadow" style="background-color: #f1f1f1;">Previous</button>
                            <button type="submit" class="btnn btn text-white mx-2 shadow" style="background-color: #7744ff;">Preview</button>
                            <button type="submit" class="btnn btn text-white mx-2 shadow" style="background-color: #7744ff;">Send for Signature</button>
                            <button class="btn btn-outline-danger mx-2 shadow">Close</button>
                        </div>
                    </div>
                  </div>
    
            </div>
        </div>
        

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select-box').select2();
        // ------------
        var ApplicantColId = 0;
        function addApplicantCol() {
            var render = document.querySelector("#addColumns");
            if (render.children.length >= 5) {
                return;
            }
            var field = `<div class="col-md-3"><div class="mb-3"><input type="text" class="form-control" required></div></div><div class="col-md-3"><div class="mb-3"><input type="text" class="form-control" required></div></div><div class="col-md-3" style="flex: 1"><div class="mb-3"><input type="text" class="form-control" required></div></div><div class="col-md-1"><button class="btn btn-danger ms-auto fa fa-trash" onclick="deleteApplicantCol('.applicant${ApplicantColId}')" style="padding: .7rem 1rem"></button></div>`;
            var row = document.createElement("div");
            row.classList.add("row","my-5","my-md-2","mb-md-0",`applicant${ApplicantColId}`);
            row.innerHTML = field;
            render.appendChild(row);
            ApplicantColId++;
        }

        function deleteApplicantCol(findElem){
            var item = document.querySelector(findElem);
            item.remove();
        }
    </script>
</body>
</html>