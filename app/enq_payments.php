<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enq_payments extends Model
{
    // protected $table = "enq_payment"; 
    public $timestamps = false;
    protected $guarder = ['id'];
    protected $fillable = [
        'enquiry_id',
        'payment_for',
        'payment_by',
        'paid_amount',
        'paid_date',
        'receipt_no',
        'gen_by',
        'gen_date',
        'receipt',
        'application_no',
        'razorpay_payment_id',
        'razorpay_payment_link_id',
        'razorpay_payment_link_reference_id',
        'razorpay_payment_link_status',
        'razorpay_signature',
        'refrence_id'
    ];
    
}
