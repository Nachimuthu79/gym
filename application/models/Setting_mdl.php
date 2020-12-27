<?php

class Setting_mdl extends CI_Model {

    function get_currency() {
        $this->db->select('*');
        $row = $this->db->get('currency')->result_array();
        return $row;
    }

	function add_setting() {

        $input = $this->input->post();
        $data['name'] = $input['name'];
        $data['currency'] = $input['currency'];
        $data['timezone'] = $input['timezone'];
        if(($logo_pic = $this->common_mdl->upload_site_logo_base64()) != false)
        {
            $data['logo'] = $logo_pic;
        }
        if(($icon_pic = $this->common_mdl->upload_site_icon_base64()) != false)
        {
            $data['icon'] = $icon_pic;
        }
        $this->db->insert('settings', $data);
        $setting_id = $this->db->insert_id();
        return $setting_id;
	}

    function get_setting($setting_id) {

        $this->db->select('*');
        $this->db->where('setting_id',$setting_id);
        $t = $this->db->get('settings');
        foreach ($t->result_array() as $row)
        {
            return $row;
        }
    }
	
	function edit_settings($setting_id) {
		
		$data = array();
		$input = $this->input->post();
        $data['name'] =$input['name'];
        $data['currency'] = $input['currency'];
        $data['timezone'] = $input['timezone'];
        if(($logo_pic = $this->common_mdl->upload_site_logo_base64()) != false)
        {
            $data['logo'] = $logo_pic;
        }
        if(($icon_pic = $this->common_mdl->upload_site_icon_base64()) != false)
        {
            $data['icon'] = $icon_pic;
        }
		$this->db->where('setting_id',$setting_id);
		$this->db->update('settings',$data);
		return $setting_id;
	}

	
	
}
	
