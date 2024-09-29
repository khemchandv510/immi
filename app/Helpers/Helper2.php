<?php

namespace App\Helpers;

use App;
use Auth;
use Request;
use App\Models\Auction\Auction;
use App\Models\Interest\Interest;
use Illuminate\Support\Facades\Session;

class Helper
{

    /**
     * * get Hashtag Name From Hashtag ID
     * ***
     * **** */
    public static function getLoginDetailByID($ID)
    {
        $Detail = App\Models\User\Login::getLoginDetailByID($ID);

        return $Detail;
    }

    public static function getallAuctionbyCategory($ID)
    {
        $Detail = App\Models\Auction\Auction::getallAuctionbyCategory($ID);

        return $Detail;
    }

    public static function CheckAuctionsbyAuctionID($AuctionID)
    {
        $Detail = App\Models\Auction\Auction::CheckAuctionsbyAuctionID($AuctionID);

        return $Detail;
    }

    public static function GetPrivilegedData($ID)
    {
        $Detail = App\Models\AccessManagement\UserRole::GetPrivilegedData($ID);

        return $Detail;
    }

    public static function getLinkDetail($user_type, $url)
    {
        $Detail = App\Models\Master\Link::getLinkDetail($user_type, $url);

        return $Detail;
    }

    public static function getAllLiveAuctionsCat()
    {
        $Detail = App\Models\Master\Category::getAllCategories();

        return $Detail;
    }

    public static function getAllLiveAucByCat()
    {
        $Detail = App\Models\Master\Category::getAllLiveAucByCat();

        return $Detail;
    }

    public static function getContentData($slug_url)
    {
        $Detail = App\Models\Master\Content::getContentData($slug_url);

        return $Detail;
    }

    public static function getBidderDetailByID($ID)
    {

        $Data = App\Models\User\Bidder::getBidderDetailByID($ID);

        return $Data;
    }

    public static function getLotsByAuctionId($auction_id)
    {

        $Data = App\Models\Auction\Lot::getNoofLotsByAuctionId($auction_id);

        return $Data;
    }

    public static function getSellerNameById($id)
    {

        $arr  = explode(',', $id);
        $Data = App\User::getNameById($arr);

        return $Data;
    }

    public static function getAuctionNameById($id)
    {

        $arr  = explode(',', $id);
        $Data = App\Models\Auction\Auction::getNameById($arr);

        return $Data;
    }

    public static function getHighestBidofLot($lot_id)
    {

        $Data = App\Models\Auction\Lot::getHighestBidByLotId($lot_id);

        return $Data;
    }

    public static function checkAutobidSet($lot_id, $bidder_id)
    {

        $Data = App\Models\Auction\Bid::checkAutoBidSetForBidder($lot_id,
                $bidder_id);

        return $Data;
    }

    public static function getLotDataByLId($lot_id)
    {

        $Data = App\Models\Auction\Lot::getLotDataByLId($lot_id);

        return $Data;
    }

    public static function getLotDataByLotId($lot_id)
    {

        $Data = App\Models\Auction\Lot::getLotDataByLotId($lot_id);

        return $Data;
    }

    public static function getHighestBidByLotId($lot_id)
    {

        $Data = App\Models\Auction\Bid::getMaxBidforLot($lot_id);

        return $Data;
    }

    public static function getPaymentStatus($lot_id, $bidder_id, $type)
    {
        $Data = App\Models\User\Payment::getPaymentStatusforLot($lot_id,
                $bidder_id, $type);

        return $Data;
    }

    public static function getSellerPaymentStatus($lot_id, $bidder_id,
                                                  $seller_id)
    {
        $Data = App\Models\Proof\SellerPaymentStatus::getSellerPaymentStatusforLot($lot_id,
                $bidder_id, $seller_id);

        return $Data;
    }

    public static function getPaymentStatusByLotId($lot_id, $type)
    {

        $Data = App\Models\User\Payment::getPaymentStatusforLotId($lot_id, $type);

        return $Data;
    }

    public static function getBidDetailsByLotId($lot_id)
    {

        $bid = App\Models\Auction\Bid::getMaxBidforLot($lot_id);
        
        
        if ($bid[0]->highest_bid != null) {
            $bidder_details     = App\Models\Auction\Bid::getHighestBidDataforLot($bid[0]->highest_bid,$lot_id);
            $arr['bidder_id']   = $bidder_details[0]->bidder_id;
            $arr['highest_bid'] = $bid[0]->highest_bid;
            $arr['bidder_name'] = $bidder_details[0]->name;
        }else{
            $arr['bidder_id']   = '';
            $arr['highest_bid'] = '';
            $arr['bidder_name'] = '';
        }


        return $arr;
    }

    public static function getLotQuantity($lot_id)
    {

        $lot_data = App\Models\Auction\Lot::getQuantityforLot($lot_id);
        return $lot_data;
    }

    public static function getpdfByLotId($lot_id)
    {

        $pdf = App\Models\Proof\Proof::getPdfNameBYLotId($lot_id);
        return $pdf;
    }

    public static function getPreBidEmdForAuction($auction_id)
    {

        $pre_emd = App\Models\Auction\Tax::getpreBidEmdforAuction($auction_id);
        return $pre_emd;
    }

    public static function getPreBidEmdStatus($auction_id)
    {

        $type    = 'P';
        $pre_emd = App\Models\User\Payment::getpreBidEmdStatusforAuction(Auth::user()->id,
                $auction_id, $type);
        return $pre_emd;
    }

    public static function getPaymentStatusByProductId($product_id,$user_id){
        $payment = App\Models\Proof\Proof::getDetailBYProductId($product_id,$user_id);
        return $payment;
    }

    public static function getPaymentStatusByPId($product_id,$user_id,$type){
        $payment = App\Models\Proof\Proof::getDetailBYPId($product_id,$user_id,$type);
        return $payment;
    }

     public static function getAuctionTimeById($id)
    {

        $arr  = explode(',', $id);
        $Data = App\Models\Auction\Auction::getTimeById($arr);

        return $Data;
    }

    public static function getTaxById($id){
        $Data = App\Models\Auction\Auction::getTaxById($id);
        return $Data;
    }

    public static function getTotalLotByAID($auctionID){
        $auction = App\Models\Auction\Lot::getNoofLotsByAuctionId($auctionID);
        return $auction;
    }

    public static function getLotsByAIDAndType($auctionID,$type){
        $auction = App\Models\Auction\Lot::getLotsByAIDAndType($auctionID,$type);
        return $auction;
    }

    public static function getStatusByAuctionID($auctionID){
        $auction = App\Models\Auction\Auction::getStatusByAuctionID($auctionID);
        return $auction;
    }

    public static function getAllMenuData()
    {
        $Detail = App\Models\AccessManagement\Module::getAllActiveMenu();
        return $Detail;
    }

     public static function getAllSubMenuData($id)
    {
        $Detail = App\Models\AccessManagement\Module::getAllSubMenu($id);
        return $Detail;
    }

     public static function getForthComingAuctions()
    {
        $Detail = App\Models\Auction\Auction::getForthComingAuctions();

        return $Detail;
    }

    public static function getLiveAuctions()
    {
        $Detail = App\Models\Auction\Auction::getLiveAuctions();

        return $Detail;
    }

    public static function ValidateLiveAuction($auction_id=NULL,$cate=NULL,$seller=NULL)
    {
        $data['liveAuctions'] = Auction::getLiveAuctionByAuctionID($auction_id,$cate,$seller);
        if(count($data['liveAuctions'])<1){return "Invalid auction Id.";}
    
        $pre_emd = self::getPreBidEmdForAuction($data['liveAuctions']->id); 
        $pre_bid_status = self::getPreBidEmdStatus($data['liveAuctions']->id); 
        if(count($pre_bid_status)){
                                        
              if($pre_bid_status[0]->transaction_status == 'P'){
                  $pre_status = "Pending. You can't select this auction as your payment is not approved by admin.";
              }elseif($pre_bid_status[0]->transaction_status == 'S'){
                  $pre_status = 'Success';
              }elseif($pre_bid_status[0]->transaction_status == 'F'){
                  $pre_status = 'Fail. Your pre Bid EMD payment is failed, so you cannot participate in an auction.';   
              }else{
                 $pre_status = 'Reject. Your payment is rejected by admin, so you cannot participate in an auction.';    
              }
             
          }else{
                   $pre_status = "You can't select this auction as you have not paid pre Bid EMD.";    
          }

          if($pre_emd[0]->pre_emd != ""){return $pre_status;}

        if(count($pre_bid_status)){
        if($pre_bid_status[0]->transaction_status != 'S'){
           if($pre_emd[0]->pre_emd == ""){return "Invalid auction Id.";}
         }
        }

        return 'valid';
    }

    public static function ValidateLiveAuctionWithLotID($auction_id=NULL,$cate=NULL,$seller=NULL,$lotid=NULL)
    {
        $data['liveAuctions'] = Auction::getLiveAuctionByAuctionIDandLotID($auction_id,$cate,$seller,$lotid);
        if(count($data['liveAuctions'])<1){return "Invalid auction/lot Id.";}
    
        $pre_emd = self::getPreBidEmdForAuction($data['liveAuctions']->id); 
        $pre_bid_status = self::getPreBidEmdStatus($data['liveAuctions']->id); 
        if(count($pre_bid_status)){
                                        
              if($pre_bid_status[0]->transaction_status == 'P'){
                  $pre_status = "Pending. You can't select this auction as your payment is not approved by admin.";
              }elseif($pre_bid_status[0]->transaction_status == 'S'){
                  $pre_status = 'Success';
              }elseif($pre_bid_status[0]->transaction_status == 'F'){
                  $pre_status = 'Fail. Your pre Bid EMD payment is failed, so you cannot participate in an auction.';   
              }else{
                 $pre_status = 'Reject. Your payment is rejected by admin, so you cannot participate in an auction.';    
              }
             
          }else{
                   $pre_status = "You can't select this auction as you have not paid pre Bid EMD.";    
          }

          if($pre_emd[0]->pre_emd != ""){return $pre_status;}

        if(count($pre_bid_status)){
        if($pre_bid_status[0]->transaction_status != 'S'){
           if($pre_emd[0]->pre_emd == ""){return "Invalid auction/lot Id.";}
         }
        }

        return 'valid';
    }
     
    
}