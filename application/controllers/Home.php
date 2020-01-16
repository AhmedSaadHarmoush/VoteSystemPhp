<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {

        $this->header();
        $this->load->view('welcome_message');
        $this->load->view('includes/footer');
    }

    function header() {
        $this->load->model('Status_model');
        $this->load->model('User_model');
        if ($this->Status_model->printStatus() == null) {
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
            array_push($valuess, array($row->id, $row->name, $row->description));
        }
        $values['committees'] = $valuess;
        $this->load->view('includes/header', $values);
    }

    function validate_user() {
        $this->load->model('User_model');
        $query = $this->User_model->validate();
        if ($query) {
            foreach ($query->result() as $row) {
                $id = $row->id;
                $type = $row->type;
                $level = $row->level;
            }
            $data = array(
                'Student_id' => $this->input->post('studentId'),
                'type' => $type,
                'id' => $id,
                'level' => $level,
                'pending' => $this->User_model->isPending(),
                'voted' => $this->User_model->hasVoted(),
                'isLoggedIn' => true
            );
            $this->session->set_userdata($data);
        }
        if ($this->session->userdata('id')) {
            if ($this->User_model->userDataIsSet()) {
                $this->session->set_userdata('Student_id', $this->User_model->getName());
                $this->index();
            } else {
                $this->header();
                $this->load->view('setUserData');
                $this->load->view('includes/footer');
            }
        } else {
            $this->index();
        }
    }

    function logout() {
        $this->session->unset_userdata('Student_id');
        $this->index();
    }

    function pannel() {
        $this->header();
        $this->load->view('pannel');
        $this->load->view('includes/footer');
    }

    function request() {
        $this->load->model('User_model');
        $query = $this->User_model->printCommittees();
        $values = array();
        foreach ($query->result() as $row) {
            array_push($values, array($row->id, $row->name));
        }
        $values['values'] = $values;
        $this->header();
        $this->load->view('vote/sure', $values);
        $this->load->view('includes/footer');
    }

    function addRequest() {
        $this->load->model('User_model');
        $id = $this->session->userdata('id');
        $committee = $this->input->post('committee');
        $level = $this->session->userdata('level');
        $this->User_model->addRequest(array($id, $committee, $level));
        $this->session->set_userdata('pending', 1);
        $this->index();
    }

    function showCommittee() {
        $values = array(
            $this->input->post('id'),
            $this->input->post('name'),
            $this->input->post('description')
        );
        $values['values'] = $values;
        $this->header();
        $this->load->view('vote/showCommittee', $values);
        $this->load->view('includes/footer');
    }

    function voteview() {
        $this->load->model('User_model');
        if ($this->User_model->printCandidates()) {
            $query = $this->User_model->printCandidates();
            $valuess = array();
            $available = array();
            foreach ($query->result() as $row) {
                $user = $this->User_model->getUserById($row->user_id);
                array_push($valuess, array($row->id, $user, $row->committee_id, $row->level));
                array_push($available, $row->committee_id);
            }
            $values['values'] = $valuess;
        } else {
            $values['values'] = null;
        }
        if ($this->User_model->printCommittees()) {
            $query = $this->User_model->printCommittees();
            $valuess = array();
            foreach ($query->result() as $row) {
                if (in_array($row->id, $available)) {
                    array_push($valuess, array($row->id, $row->name));
                }
            }
            $values['committees'] = $valuess;
        } else {
            $values['committees'] = null;
        }
        $this->header();
        $this->load->view('vote/voteview', $values);
        $this->load->view('includes/footer');
    }

    function vote() {
        $this->load->model('User_model');
        if ($this->User_model->printCandidates()) {
            $query = $this->User_model->printCandidates();
            $valuess = array();
            $available = array();
            foreach ($query->result() as $row) {
                $user = $this->User_model->getUserById($row->user_id);
                array_push($valuess, array($row->id, $user, $row->committee_id, $row->level));
                array_push($available, $row->committee_id);
            }
            $values['values'] = $valuess;
        } else {
            $values['values'] = null;
        }
        if ($this->User_model->printCommittees()) {
            $query = $this->User_model->printCommittees();
            $valuess = array();
            foreach ($query->result() as $row) {
                if (in_array($row->id, $available)) {
                    array_push($valuess, array($row->id, $row->name));
                }
            }
            $values['committees'] = $valuess;
        } else {
            $values['committees'] = null;
        }
        $votes = array();
        foreach ($values['committees'] as $committee) {

            $candidate1 = $this->input->post("candidate1$committee[0]");
            $candidate2 = $this->input->post("candidate2$committee[0]");
            if ($candidate1 == $candidate2) {
                $message = "لا يمكنك اختيار نفس المرشح مرتين";
                echo "<script>alert('$message') ;</script>";
                $votes = array();
                break;
                $this->voteview();
            } else {
                array_push($votes, array($candidate1, $candidate2, $committee[0]));
            }
        }
        foreach ($votes as $vote) {
            $this->User_model->setVote(array($this->session->userdata('id'), $vote[0], $vote[1], $vote[2]));
        }
        $this->index();
    }

    function results() {
        $this->load->model('User_model');
        if ($this->User_model->printCandidates()) {
            $query = $this->User_model->printCandidates();
            $valuess = array();
            $available = array();
            foreach ($query->result() as $row) {
                $user = $this->User_model->getUserById($row->user_id);
                $votes = $this->User_model->printVotes($row->id);
                array_push($valuess, array($row->id, $user, $row->committee_id, $row->level, $votes));
                array_push($available, $row->committee_id);
            }
            $values['values'] = $valuess;
        } else {
            $values['values'] = null;
        }
        if ($this->User_model->printCommittees()) {
            $query = $this->User_model->printCommittees();
            $valuess = array();
            foreach ($query->result() as $row) {
                if (in_array($row->id, $available)) {
                    array_push($valuess, array($row->id, $row->name));
                }
            }
            $values['committees'] = $valuess;
        } else {
            $values['committees'] = null;
        }

        $this->header();
        $this->load->view('vote/results', $values);
        $this->load->view('includes/footer');
    }

    function addUserData() {
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'afname' => $this->input->post('afname'),
            'alname' => $this->input->post('alname'),
            'gender' => $this->input->post('gender'),
            'national_id' => $this->input->post('national_id'),
            'telephone' => $this->input->post('telephone'),
            'mobile' => $this->input->post('mobile'),
            'mail' => $this->input->post('mail'),
            'address' => $this->input->post('address')
        );
        $this->load->model('User_model');
        $this->User_model->addUserData($data);
        $this->setUserFuzzyView();
    }

    function setUserFuzzyView() {
        $this->header();
        $this->load->view('setUserFuzzy');
        $this->load->view('includes/footer');
    }

    function setUserFuzzy() {
        $data = array(
            $this->input->post('check1'),
            $this->input->post('check2'),
            $this->input->post('check3'),
            $this->input->post('check4'),
            $this->input->post('check5'),
            $this->input->post('check6'),
            $this->input->post('check7'),
            $this->input->post('check8'),
            $this->input->post('check9'),
            $this->input->post('check10'),
            $this->input->post('check11'),
            $this->input->post('check12'),
            $this->input->post('check13'),
            $this->input->post('check14'),
            $this->input->post('check15'),
            $this->input->post('check16'),
            $this->input->post('check17'),
            $this->input->post('check18'),
            $this->input->post('check19'),
            $this->input->post('check20'),
            $this->input->post('check21'),
            $this->input->post('check22'),
            $this->input->post('check23'),
            $this->input->post('check24'),
            $this->input->post('check25'),
            $this->input->post('check26'),
            $this->input->post('check27'),
            $this->input->post('check28'),
            $this->input->post('check29')
        );
        $fuzzy=implode(",",$data);
        $this->load->model('User_model');
        $this->User_model->setUserFuzzy($fuzzy);
        $this->index();
    }

}
