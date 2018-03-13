  public function logout(){
        // Unset User Data
        $this->session->unset_userdata('logged_in_front');
        $this->session->unset_userdata('user_id_front');
        $this->session->unset_userdata('username_front');
        $this->session->sess_destroy();


        // Set Message
        $this->session->set_flashdata('logged_out','You have been Logged Out');
        redirect('login');
    }