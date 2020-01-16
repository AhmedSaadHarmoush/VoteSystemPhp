<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    //redirections
    function process() {
        $this->load->model('Status_model');
        $query = $this->Status_model->printStatus();
        $values = array();
        foreach ($query->result() as $row) {
            array_push($values, $row->active);
        }
        $values['values'] = $values;
        $this->load->view('includes/header');
        $this->load->view('admin/process', $values);
        $this->load->view('includes/footer');
    }

    function header() {
        $this->load->model('Status_model');
        $this->load->model('User_model');
        if($this->Status_model->printStatus() ==null){
            echo 'Error';
        }
        $query = $this->Status_model->printStatus();
        $valuess = array();
        foreach ($query->result() as $row) {
            array_push($valuess, $row->active);
        }
        $values['values'] = $valuess;
        $query = $this->User_model->printCommittees();
        $valuess = array();
        foreach ($query->result() as $row) {
            array_push($valuess, array($row->id,$row->name,$row->description));
        }
        $values['committees'] = $valuess;
        $this->load->view('includes/header', $values);
    }

    function pannel() {
        $this->header();
        $this->load->view('pannel');
        $this->load->view('includes/footer');
    }

    //Status controller
    function turnVoting() {
        $this->load->model('Status_model');
        $this->Status_model->turnVoting();
        $this->process();
    }

    function killVoting() {
        $this->load->model('Status_model');
        $this->Status_model->killVoting();
        $this->process();
    }

    function turnRequests() {
        $this->load->model('Status_model');
        $this->Status_model->turnRequests();
        $this->process();
    }

    function killRequests() {
        $this->load->model('Status_model');
        $this->Status_model->killRequests();
        $this->process();
    }

    //User Controllers
    function addUser() {
        $this->load->model('User_model');
        $name = array($this->input->post('user_id'), $this->input->post('password'), $this->input->post('level'));
        $this->User_model->addUser($name);
        $this->pannel();
    }

    function addUserview() {
        $this->load->view('includes/header');
        $this->load->view('admin/addUser');
        $this->load->view('includes/footer');
    }

    function printUsers() {
        $this->load->model('User_model');
        if ($this->User_model->printUsers()) {
            $query = $this->User_model->printUsers();
            $values = array();
            foreach ($query->result() as $row) {
                if ($row->type != 0)
                    array_push($values, array($row->id, $row->user_id, $row->password, $row->level));
            }
            $values['values'] = $values;
        } else {
            $values['values'] = null;
        }
        $this->header();
        $this->load->view('admin/printUsers', $values);
        $this->load->view('includes/footer');
    }

    //Candidates controllers
    function printCandidates() {
        $this->load->model('User_model');
        if ($this->User_model->printCandidates()) {
            $query = $this->User_model->printCandidates();
            $values = array();
            foreach ($query->result() as $row) {
                $committee = $this->User_model->getCommitteeById($row->committee_id);
                array_push($values, array($row->id, $row->user_id, $committee, $row->level));
            }
            $values['values'] = $values;
        } else {
            $values['values'] = null;
        }
        $this->header();
        $this->load->view('admin/printCandidates', $values);
        $this->load->view('includes/footer');
    }

    function deleteCandidate() {
        $this->load->model('User_model');
        $id = $this->input->post('id');
        $this->User_model->deleteCandidate($id);
        $this->printCandidates();
    }

    //Committees controllers
    function addCommittee() {
        $this->load->model('User_model');
        $name = $this->input->post('name');
        $this->User_model->addCommittee($name);
        $this->pannel();
    }

    function addCommitteeview() {
        $this->load->view('includes/header');
        $this->load->view('admin/addCommittee');
        $this->load->view('includes/footer');
    }

    function printCommitees() {
        $this->load->model('User_model');
        if ($this->User_model->printCommittees()) {
            $query = $this->User_model->printCommittees();
            $values = array();
            foreach ($query->result() as $row) {
                array_push($values, array($row->id, $row->name));
            }
            $values['values'] = $values;
        } else {
            $values['values'] = null;
        }
        $this->header();
        $this->load->view('admin/printCommittees', $values);
        $this->load->view('includes/footer');
    }

    function EditCommitteeDescription() {
        $this->load->model('User_model');
        $query = $this->User_model->getCommittee($this->input->post('id'));
        foreach ($query->result() as $row) {
            $committee = array($row->id, $row->name, $row->description);
        }
        $values['values'] = $committee;
        $this->header();
        $this->load->view('admin/EditCommitteeDescription', $values);
        $this->load->view('includes/footer');
    }

    function EditDescription() {
        $this->load->model('User_model');
        $description = array($this->input->post('id'), $this->input->post('name'), $this->input->post('description'));
        $this->User_model->editDescription($description);
        $this->printCommitees();
    }


    //pending requests controllers
    function printRequest() {
        $this->load->model('User_model');
        if ($this->User_model->printRequest()) {
            $query = $this->User_model->printRequest();
            $values = array();

            foreach ($query->result() as $row) {
                $user = $this->User_model->getUserById($row->user_id);
                $committee = $this->User_model->getCommitteeById($row->committee_id);
                array_push($values, array($row->id, $user, $committee, $row->level));
            }
            $values['values'] = $values;
        } else {
            $values['values'] = null;
        }
        $this->header();
        $this->load->view('admin/acceptRequest', $values);
        $this->load->view('includes/footer');
    }

    function acceptRequest() {
        $this->load->model('User_model');
        $query = $this->User_model->acceptRequest($this->input->post('id'));
        $this->printRequest();
    }

    function rejectRequest() {
        $this->load->model('User_model');
        $query = $this->User_model->rejectRequest($this->input->post('id'));
        $this->printRequest();
    }

}
