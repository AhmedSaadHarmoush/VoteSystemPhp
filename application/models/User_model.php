<?php

class User_model extends CI_Model {

    //User Table Methods
    function validate() {
        $this->db->where('user_id', $this->input->post('studentId'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('user');
        //echo "<script>console.log( 'Debug Objects: " .$query->num_rows(). "' );</script>";

        if ($query->num_rows() == 1) {
            return $query;
        }
    }

    function getUserById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        if ($query->num_rows() >= 1) {
            foreach ($query->result() as $row) {
                return $row->user_id;
            }
        }
    }

    function addUser($name) {
        $data = array(
            'user_id' => $name[0],
            'password' => $name[1],
            'level' => $name[2],
            'type' => 1
        );
        $this->db->insert('user', $data);
        return 1;
    }

    function printUsers() {
        $this->db->order_by("level", "desc");
        $query = $this->db->get('user');
        if ($query->num_rows() >= 1) {
            return $query;
        }
    }

    //Committee Table Methods
    function printCommittees() {
        $query = $this->db->get('committee');
        if ($query->num_rows() >= 1) {
            return $query;
        }
    }

    function getCommitteeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('committee');
        if ($query->num_rows() >= 1) {
            foreach ($query->result() as $row) {
                return $row->name;
            }
        }
    }

    function getCommittee($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('committee');
        if ($query->num_rows() >= 1) {
            return $query;
        }
    }

    function addCommittee($name) {
        $data = array(
            'name' => $name
        );

        $this->db->insert('committee', $data);
        return 1;
    }

    function editDescription($description) {
        $data = array(
            'name' => $description[1],
            'description' => $description[2]
        );
        $this->db->where('id', $description[0]);
        $this->db->update('committee', $data);
    }

    //Request Table Methods
    function isPending() {
        $id = $this->session->userdata('id');
        $this->db->where('user_id', $id);
        $query = $this->db->get('request');
        if ($query->num_rows() == 1) {
            return 1;
        } else
            return 0;
    }

    function addRequest($request) {
        $data = array(
            'user_id' => $request[0],
            'committee_id' => $request[1],
            'level' => $request[2],
        );

        $this->db->insert('request', $data);
        return 1;
    }

    function printRequest() {
        $query = $this->db->get('request');
        if ($query->num_rows() >= 1) {
            return $query;
        }
    }

    function acceptRequest($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('request');
        if ($query->num_rows() >= 1) {

            foreach ($query->result() as $row) {
                $data = array(
                    'user_id' => $row->user_id,
                    'committee_id' => $row->committee_id,
                    'level' => $row->level,
                );
            }
            $this->db->delete('request', array('id' => $id));
            $this->db->insert('candidate', $data);
        }
    }

    function rejectRequest($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('request');
        if ($query->num_rows() >= 1) {
            $this->db->delete('request', array('id' => $id));
        }
    }

    //Candidates Table Methods
    function printCandidates() {
        $this->db->order_by("level", "desc");
        $this->db->order_by("committee_id", "desc");
        $query = $this->db->get('candidate');
        if ($query->num_rows() >= 1) {
            return $query;
        }
    }

    function deleteCandidate($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('candidate');
        if ($query->num_rows() >= 1) {
            $this->db->delete('candidate', array('id' => $id));
        }
    }

    //Votes Table Methods
    function setVote($name) {
        $data = array(
            'user_id' => $name[0],
            'candidate1_id' => $name[1],
            'candidate2_id' => $name[2],
            'committee_id' => $name[3]
        );
        $this->db->insert('votes', $data);
        return 1;
    }

    function hasVoted() {
        $id = $this->session->userdata('id');
        $this->db->where('user_id', $id);
        $query = $this->db->get('votes');
        if ($query->num_rows() >= 1) {
            return 1;
        } else
            return 0;
    }

    function printVotes($candidate) {
        $this->db->where('candidate1_id', $candidate);
        $this->db->or_where('candidate2_id', $candidate);
        $query = $this->db->get('votes');

        if ($query->num_rows() >= 1) {
            return $query->num_rows();
        }
    }

    //User_data Table Methods
    function userDataIsSet() {
        $id = $this->session->userdata('id');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_data');
        if ($query->num_rows() >= 1) {
            return 1;
        } else
            return 0;
    }

    function userFuzzyIsSet() {
        $id = $this->session->userdata('id');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_data');
        if ($query->num_rows() >= 1) {
            if ($query->num_rows() >= 1) {
                if($row->fuzzy != null)
                    return 1;
            }
        } else
            return 0;
    }

    function addUserData($data) {
        $this->db->insert('user_data', $data);
        return 1;
    }

    function setUserFuzzy($fuzzy) {

        $this->db->where('user_id', $this->session->userdata('id'));
        $data = array(
            'fuzzy' => $fuzzy
        );
        $this->db->update('user_data', $data);
        return 1;
    }

    function getName() {
        $id = $this->session->userdata('id');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_data');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                //echo "<script>console.log( 'Debug Objects: " .$row->alname." ".$row->afname. "' );</script>";
                return $row->afname . " " . $row->alname;
            }
        }
    }

}
?>

