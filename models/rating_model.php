<?php
Class rating_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fetch records
    public function getRating($id, $pid) {



        $posts_arr = array();


            // User rating
            $this->db->select('rating');
            $this->db->from('product_rating');
            $this->db->where("userid", $id);
            $this->db->where("productid", $pid);
            $userRatingquery = $this->db->get();

            $userpostResult = $userRatingquery->result_array();

            $userRating = 0;
            if(count($userpostResult)>0){
                $userRating = $userpostResult[0]['rating'];
            }

            // Average rating
            $this->db->select('ROUND(AVG(rating),1) as averageRating');
            $this->db->from('product_rating');
            $this->db->where("productid", $pid);
            $ratingquery = $this->db->get();

            $postResult = $ratingquery->result_array();

            $rating = $postResult[0]['averageRating'];

            if($rating == ''){
                $rating = 0;
            }

            $posts_arr[] = array("rating"=>$userRating,"averagerating"=>$rating);


        return $posts_arr;
    }

    // Save user rating
    public function userRating($userid,$postid,$rating){
        $this->db->select('*');
        $this->db->from('product_rating');
        $this->db->where("productid", $postid);
        $this->db->where("userid", $userid);
        $userRatingquery = $this->db->get();

        $userRatingResult = $userRatingquery->result_array();
        if(count($userRatingResult) > 0){

            $postRating_id = $userRatingResult[0]['id'];
            // Update
            $value=array('rating'=>$rating);
            $this->db->where('id',$postRating_id);
            $this->db->update('product_rating',$value);
        }else{
            $userRating = array(
                "productid" => $postid,
                "userid" => $userid,
                "rating" => $rating
            );

            $this->db->insert('product_rating', $userRating);
        }

        // Average rating
        $this->db->select('ROUND(AVG(rating),1) as averageRating');
        $this->db->from('product_rating');
        $this->db->where("productid", $postid);
        $ratingquery = $this->db->get();

        $postResult = $ratingquery->result_array();

        $rating = $postResult[0]['averageRating'];

        if($rating == ''){
            $rating = 0;
        }

        return $rating;
    }

}