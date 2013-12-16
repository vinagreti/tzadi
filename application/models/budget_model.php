<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget_Model extends CI_Model {

    public function setBudget( $newData ){

        if( isset( $newData->timelife ) ) $budget["timelife"] = ( $newData->timelife > 0 ) ? $newData->timelife : 1;

        $edited = $this->mongo_db
            ->where( '_id', $this->session->userdata("org") )
            ->set("budget", $budget)
            ->update("org");

        if( $edited ){

            return array("status" => "success", "message" => lang("tmpt_changesSaved"));

        }

        else
            return array("status" => "error", "message" => lang("tmpt_changesNotSaved"));

    }

    public function getBudget( $org = false ){

        if( ! $org ){

            $org = $this->session->userdata("org");

        }

        $this->load->model("org_model");

        $agency = $this->org_model->getByID( $org );

        return $agency["budget"];

    }

}